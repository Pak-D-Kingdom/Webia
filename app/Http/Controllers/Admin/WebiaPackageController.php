<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class WebiaPackageController extends Controller
{
    public function index(): View
    {
        return view('admin.packages.index', [
            'packages' => WebiaPackage::query()->with('templates:id')->withCount('orders')->orderBy('sort_order')->get(),
            'templates' => WebiaTemplate::query()->where('is_active', true)->orderBy('name')->get(['id', 'name', 'category_label']),
        ]);
    }

    public function toggle(Request $request, WebiaPackage $package): RedirectResponse|JsonResponse
    {
        $package->update(['is_active' => ! $package->is_active]);

        $message = $package->is_active ? 'Paket berhasil diaktifkan.' : 'Paket berhasil dinonaktifkan.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message, 'is_active' => $package->is_active]);
        }

        return redirect()->route('admin.packages.index')->with('status', $message);
    }

    public function create(): View
    {
        return view('admin.packages.form', [
            'package' => new WebiaPackage,
            'templates' => WebiaTemplate::query()->where('is_active', true)->orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);
        $package = WebiaPackage::create($validated);
        $package->templates()->sync($validated['template_ids'] ?? []);

        return redirect()->route('admin.packages.index')->with('status', 'Paket berhasil ditambahkan.');
    }

    public function edit(WebiaPackage $package): View
    {
        return view('admin.packages.form', [
            'package' => $package->load('templates:id'),
            'templates' => WebiaTemplate::query()->where('is_active', true)->orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function update(Request $request, WebiaPackage $package): RedirectResponse
    {
        $validated = $this->validated($request, $package);
        $package->update($validated);
        $package->templates()->sync($validated['template_ids'] ?? []);

        return redirect()->route('admin.packages.index')->with('status', 'Paket berhasil diperbarui.');
    }

    public function destroy(WebiaPackage $package): RedirectResponse
    {
        if ($package->orders()->exists()) {
            throw ValidationException::withMessages(['package' => 'Paket yang sudah digunakan order tidak dapat dihapus. Nonaktifkan paket sebagai gantinya.']);
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('status', 'Paket berhasil dihapus.');
    }

    /** @return array<string, mixed> */
    private function validated(Request $request, ?WebiaPackage $package = null): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('webia_packages')->ignore($package)],
            'description' => ['required', 'string', 'max:500'],
            'old_price' => ['nullable', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'hosting_monthly_price' => ['required', 'integer', 'min:1'],
            'cms_enabled' => ['nullable', 'boolean'],
            'chatbot_monthly_quota' => ['required', 'integer', 'min:0'],
            'features' => ['required', 'string'],
            'template_ids' => ['nullable', 'array'],
            'template_ids.*' => ['integer', Rule::exists('webia_templates', 'id')->where('is_active', true)],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['features'] = array_values(array_filter(array_map('trim', preg_split('/\R/', $validated['features']) ?: [])));
        if ($validated['features'] === []) {
            throw ValidationException::withMessages(['features' => 'Isi minimal satu fitur paket.']);
        }

        $validated['cms_enabled'] = $request->boolean('cms_enabled');
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
