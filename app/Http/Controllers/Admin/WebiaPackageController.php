<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaPackage;
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
        return view('admin.packages.index', ['packages' => WebiaPackage::query()->withCount('orders')->orderBy('sort_order')->get()]);
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
        return view('admin.packages.form', ['package' => new WebiaPackage]);
    }

    public function store(Request $request): RedirectResponse
    {
        WebiaPackage::create($this->validated($request));

        return redirect()->route('admin.packages.index')->with('status', 'Paket berhasil ditambahkan.');
    }

    public function edit(WebiaPackage $package): View
    {
        return view('admin.packages.form', compact('package'));
    }

    public function update(Request $request, WebiaPackage $package): RedirectResponse
    {
        $package->update($this->validated($request, $package));

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
            'cms_enabled' => ['nullable', 'boolean'],
            'chatbot_monthly_quota' => ['required', 'integer', 'min:0'],
            'features' => ['required', 'string'],
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
