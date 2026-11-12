<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
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
        $isDelivered = $hasOrder && $order->delivery_status === 'delivered' && $order->status === 'paid' && !empty($order->site_slug);

        $tenantId = $isDelivered ? $order->site_slug : null;
        $tierSlug = $order?->package?->slug ?? 'pixel';
        $monthlyLimit = (int) ($order?->package?->chatbot_monthly_quota ?? 500);

        // Ambil data kuota tersinkronisasi HANYA jika akun ini memiliki website yang sudah aktif
        $quotaData = $tenantId
            ? AiQuotaService::getTenantQuota($tenantId, $tierSlug, $monthlyLimit)
            : null;

        $aiOnline = AiQuotaService::isOnline();
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
            'quotaData',
            'aiOnline',
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
        if ($isSuccess) {
            $bizData = $order->business_data ?? [];
            if ($request->filled('welcome_message')) {
                $bizData['welcome_message'] = $request->input('welcome_message');
            }
            if ($request->filled('whatsapp_cs')) {
                $bizData['whatsapp'] = $request->input('whatsapp_cs');
            }
            if (!empty($alamat)) {
                $bizData['address'] = $alamat;
            }
            $order->update(['business_data' => $bizData]);
        }

        $msg = $isSuccess
            ? 'Pengaturan & informasi bisnis berhasil disimpan! Asisten AI website Anda langsung diperbarui.'
            : 'Gagal memperbarui informasi bisnis ke AI. Silakan coba lagi.';

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
