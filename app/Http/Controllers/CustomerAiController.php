<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerAiController extends Controller
{
    /**
     * Tampilkan halaman monitoring Asisten AI & Kuota Pesan untuk konsumen.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        // 1. Ambil website milik akun konsumen sendiri yang sudah memiliki site_slug
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->with(['package', 'template'])
            ->latest()
            ->first();

        // Fallback jika belum memiliki order ber-site_slug (misal masih draft/pending)
        if (! $order) {
            $order = WebiaOrder::whereBelongsTo($user)
                ->with(['package', 'template'])
                ->latest()
                ->first();
        }

        // Tentukan status kelayakan AI murni dari akun pengguna sendiri (TIDAK ADA mode demo/dummy)
        $hasOrder = ($order !== null);
        $isDelivered = $hasOrder && $order->delivery_status === 'delivered' && $order->status === 'paid' && ! empty($order->site_slug);
        $canEditKnowledge = $isDelivered && ($order?->customer_ai_knowledge_editable ?? true);

        $tenantId = $isDelivered ? $order->site_slug : null;
        $tierSlug = $order?->package?->slug ?? 'pixel';
        $monthlyLimit = (int) ($order?->package?->chatbot_monthly_quota ?? 500);

        // Ambil data kuota tersinkronisasi HANYA jika akun ini memiliki website yang sudah aktif
        $quotaData = $tenantId
            ? AiQuotaService::getTenantQuota($tenantId, $tierSlug, $monthlyLimit)
            : null;

        $aiConnection = AiQuotaService::connectionStatus();
        $aiOnline = $aiConnection['engine_online'];
        $aiError = null;

        // Ambil wawasan analitik HANYA jika akun ini memiliki website yang sudah aktif
        $insights = $tenantId ? AiQuotaService::getTenantInsights($tenantId) : [];
        $usageTrend = $insights['usage_trend_7d'] ?? [];
        $topQuestions = $insights['top_questions'] ?? [];
        $registeredWhatsApp = $order?->business_data['whatsapp'] ?? ($user?->phone ?? '081234567890');

        // Ambil knowledge base untuk fitur "Latih AI Bisnis Anda"
        $knowledge = $tenantId ? AiQuotaService::getTenantKnowledge($tenantId) : null;
        $profilText = $knowledge['profil'] ?? '';
        $currentWelcome = preg_match('/-\s+\*\*Sapaan\*\*:\s*(.*)/m', $profilText, $m)
            ? trim($m[1])
            : 'Halo! Selamat datang di website kami, ada yang bisa kami bantu?';
        $currentWhatsappCs = preg_match('/-\s+\*\*WhatsApp\*\*:\s*(.*)/m', $profilText, $m2)
            ? trim($m2[1])
            : $registeredWhatsApp;

        $currentJamOperasional = preg_match('/-\s+\*\*Jam Operasional\*\*:\s*([^\n\r]+)/m', $profilText, $mJam)
            ? trim($mJam[1])
            : '';
        $currentAlamat = preg_match('/-\s+\*\*Alamat\*\*:\s*([^\n\r]+)/m', $profilText, $mAlamat)
            ? trim($mAlamat[1])
            : '';
        $currentHotline = preg_match('/-\s+\*\*Hotline\*\*:\s*([^\n\r]+)/m', $profilText, $mHotline)
            ? trim($mHotline[1])
            : $registeredWhatsApp;
        $currentPengumuman = preg_match('/-\s+\*\*Pengumuman\*\*:\s*([^\n\r]+)/m', $profilText, $mAnn)
            ? trim($mAnn[1])
            : '';

        // Deteksi apakah bisnis beroperasi online saja / tanpa toko fisik
        $isOnlineOnly = empty($currentAlamat)
            || str_contains(strtolower($currentAlamat), 'online')
            || str_contains(strtolower($currentAlamat), 'tanpa kantor fisik')
            || str_contains(strtolower($currentAlamat), 'daring');

        $endOfMonth = Carbon::now()->endOfMonth();
        $resetDateFormatted = $endOfMonth->locale('id')->isoFormat('D MMMM Y');
        $daysUntilReset = max(1, (int) Carbon::now()->diffInDays($endOfMonth, false));

        return view('customer.ai', compact(
            'order',
            'hasOrder',
            'isDelivered',
            'canEditKnowledge',
            'quotaData',
            'aiOnline',
            'aiConnection',
            'aiError',
            'resetDateFormatted',
            'daysUntilReset',
            'usageTrend',
            'topQuestions',
            'registeredWhatsApp',
            'tenantId',
            'knowledge',
            'currentWelcome',
            'currentWhatsappCs',
            'currentJamOperasional',
            'currentAlamat',
            'currentHotline',
            'currentPengumuman',
            'isOnlineOnly'
        ));
    }

    /**
     * Klien menambahkan Pertanyaan & Jawaban (FAQ) baru untuk melatih AI websitenya.
     */
    public function storeFaq(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'question' => 'required|string|min:4|max:255',
            'answer' => 'required|string|min:4|max:1000',
        ]);

        $user = $request->user();
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->latest()
            ->first();

        if (! $order || empty($order->site_slug)) {
            $err = 'Website Anda belum memiliki ID asisten AI aktif.';
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'error', 'message' => $err], 400);
            }

            return redirect()->back()->with('error', $err);
        }

        $res = AiQuotaService::appendTenantFaq(
            $order->site_slug,
            $request->input('question'),
            $request->input('answer')
        );

        $isSuccess = (($res['status'] ?? '') === 'success');
        $msg = $isSuccess
            ? 'Pertanyaan & Jawaban baru berhasil disimpan! Asisten AI website Anda kini langsung dapat menjawabnya.'
            : 'Gagal menyimpan FAQ ke AI Assistant. Silakan coba lagi.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => $isSuccess ? 'success' : 'error',
                'message' => $msg,
            ], $isSuccess ? 200 : 500);
        }

        return $isSuccess
            ? redirect()->back()->with('success', $msg)
            : redirect()->back()->with('error', $msg);
    }

    /**
     * Memperbarui pesan sapaan awal (welcome message) dan nomor WhatsApp CS handoff.
     */
    public function updateSettings(Request $request): RedirectResponse
    {
        $request->validate([
            'welcome_message' => 'nullable|string|max:255',
            'whatsapp_cs' => 'nullable|string|max:25',
        ]);

        $user = $request->user();
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->latest()
            ->first();

        if (! $order || empty($order->site_slug)) {
            return redirect()->back()->with('error', 'Website Anda belum memiliki ID asisten AI aktif.');
        }

        $res = AiQuotaService::updateTenantSettings($order->site_slug, $request->only(['welcome_message', 'whatsapp_cs']));

        if (($res['status'] ?? '') === 'success') {
            return redirect()->back()->with('success', 'Pengaturan pesan sapaan dan nomor WA CS berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui pengaturan AI. Silakan coba lagi.');
    }

    /**
     * Simulasi coba AI langsung (Interactive Playground) dari portal konsumen.
     */
    /**
     * Memperbarui informasi operasional & profil terstruktur bisnis klien
     * secara aman tanpa merusak dokumen markdown knowledge base.
     */
    /**
     * Memperbarui informasi operasional & pengaturan terpadu asisten AI bisnis klien
     * secara aman tanpa merusak dokumen markdown knowledge base.
     */
    public function updateBusinessInfo(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'welcome_message' => 'nullable|string|max:255',
            'whatsapp_cs' => 'nullable|string|max:25',
            'is_online_only' => 'nullable|boolean',
            'alamat' => 'nullable|string|max:500',
            'pengumuman' => 'nullable|string|max:500',
        ]);

        $user = $request->user();
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->latest()
            ->first();

        if (! $order || empty($order->site_slug)) {
            $err = 'Website Anda belum memiliki ID asisten AI aktif.';
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'error', 'message' => $err], 400);
            }

            return redirect()->back()->with('error', $err);
        }

        // Tentukan alamat fisik atau operasional online
        $alamat = $request->input('alamat');
        if ($request->boolean('is_online_only')) {
            $alamat = 'Beroperasi penuh secara online (Layanan digital tanpa kantor fisik / toko offline)';
        }

        $res = AiQuotaService::updateTenantBusinessInfo($order->site_slug, [
            'welcome_message' => $request->input('welcome_message'),
            'whatsapp_cs' => $request->input('whatsapp_cs'),
            'alamat' => $alamat,
            'pengumuman' => $request->input('pengumuman'),
        ]);

        $isSuccess = (($res['status'] ?? '') === 'success');
        $aiSynced = $isSuccess && ($res['sync_source'] ?? null) !== 'local_file';

        $bizData = $order->business_data ?? [];
        if ($request->filled('welcome_message')) {
            $bizData['welcome_message'] = $request->input('welcome_message');
        }
        if ($request->filled('whatsapp_cs')) {
            $bizData['whatsapp'] = $request->input('whatsapp_cs');
        }
        if (! empty($alamat)) {
            $bizData['address'] = $alamat;
        }
        $order->update(['business_data' => $bizData]);

        $msg = $aiSynced
            ? 'Pengaturan & informasi bisnis berhasil disimpan! Asisten AI website Anda langsung diperbarui.'
            : 'Pengaturan bisnis berhasil disimpan di portal. Sinkronisasi ke chatbot akan berjalan saat layanan AI aktif.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $msg,
                'ai_synced' => $aiSynced,
            ], 200);
        }

        return redirect()->back()->with('success', $msg);
    }

    /**
     * Memperbarui 4 berkas dokumen Knowledge Base AI (layanan.md, faq.md, kebijakan.md, profil.md)
     * secara mandiri oleh klien untuk melatih asisten AI bisnis mereka.
     */
    public function updateKnowledge(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'layanan' => 'nullable|string|max:20000',
            'faq' => 'nullable|string|max:20000',
            'kebijakan' => 'nullable|string|max:20000',
            'business_name' => 'nullable|string|max:150',
            'whatsapp_cs' => 'nullable|string|max:25',
            'jam_operasional' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:500',
            'welcome_message' => 'nullable|string|max:255',
            'profil_context' => 'nullable|string|max:3000',
        ]);

        $user = $request->user();
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->latest()
            ->first();

        if (! $order || empty($order->site_slug)) {
            $err = 'Website Anda belum memiliki ID asisten AI aktif.';
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'error', 'message' => $err], 400);
            }
            return redirect()->back()->with('error', $err);
        }

        if (! ($order->customer_ai_knowledge_editable ?? true)) {
            $err = 'Editor Knowledge Base saat ini dikelola oleh tim WEBIA.';
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'error', 'message' => $err], 403);
            }

            return redirect()->back()->with('error', $err);
        }

        $profil = collect([
            filled($validated['business_name'] ?? null) ? '# '.$validated['business_name'] : null,
            filled($validated['welcome_message'] ?? null) ? '- **Sapaan**: '.$validated['welcome_message'] : null,
            filled($validated['whatsapp_cs'] ?? null) ? '- **WhatsApp**: '.$validated['whatsapp_cs'] : null,
            filled($validated['jam_operasional'] ?? null) ? '- **Jam Operasional**: '.$validated['jam_operasional'] : null,
            filled($validated['alamat'] ?? null) ? '- **Alamat**: '.$validated['alamat'] : null,
            filled($validated['profil_context'] ?? null) ? "\n## Konteks Jawaban AI\n".$validated['profil_context'] : null,
        ])->filter()->implode("\n");
        $knowledgePayload = [
            'layanan' => $validated['layanan'] ?? null,
            'faq' => $validated['faq'] ?? null,
            'kebijakan' => $validated['kebijakan'] ?? null,
            'profil' => $profil,
        ];
        $res = AiQuotaService::saveTenantKnowledge($order->site_slug, $knowledgePayload);

        // Simpan juga ke business_data di order
        $current = $order->business_data ?? [];
        $current['kb_layanan'] = $validated['layanan'] ?? null;
        $current['kb_faq'] = $validated['faq'] ?? null;
        $current['kb_kebijakan'] = $validated['kebijakan'] ?? null;
        $current['kb_profil'] = $profil;
        foreach (['business_name', 'whatsapp_cs', 'alamat', 'jam_operasional', 'welcome_message'] as $field) {
            if (filled($validated[$field] ?? null)) {
                $current[$field === 'whatsapp_cs' ? 'whatsapp' : $field] = $validated[$field];
            }
        }
        if (($res['status'] ?? '') === 'success') {
            $current['ai_knowledge_saved_at'] = $res['knowledge_saved_at'] ?? now()->toIso8601String();
            $current['ai_rag_indexed_at'] = $res['rag_indexed_at'] ?? null;
        }
        $order->update(['business_data' => $current]);

        $isSuccess = (($res['status'] ?? '') === 'success');
        $msg = $isSuccess
            ? 'Knowledge Base Asisten AI (layanan.md, faq.md, kebijakan.md, profil.md) berhasil disimpan dan aktif!'
            : 'Gagal memperbarui Knowledge Base AI. Silakan coba lagi.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => $isSuccess ? 'success' : 'error',
                'message' => $msg,
                'knowledge_saved_at' => $current['ai_knowledge_saved_at'] ?? null,
                'rag_indexed_at' => $current['ai_rag_indexed_at'] ?? null,
            ], $isSuccess ? 200 : 500);
        }

        return $isSuccess
            ? redirect()->back()->with('success', $msg)
            : redirect()->back()->with('error', $msg);
    }

public function simulateChat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|min:2|max:500',
        ]);

        $user = $request->user();
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->latest()
            ->first();

        if (! $order || empty($order->site_slug)) {
            return response()->json([
                'status' => 'error',
                'reply' => 'Website Anda belum memiliki ID asisten AI aktif.',
            ], 400);
        }

        $res = AiQuotaService::simulateChat($order->site_slug, $request->input('message'));

        return response()->json($res);
    }
}
