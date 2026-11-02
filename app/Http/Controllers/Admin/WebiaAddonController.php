<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebiaAddonController extends Controller
{
    public function index(): View
    {
        $usageCounts = [];
        WebiaOrder::query()->select('addon_ids')->chunk(500, function ($orders) use (&$usageCounts): void {
            foreach ($orders as $order) {
                foreach ($order->addon_ids ?? [] as $id) {
                    $usageCounts[(int) $id] = ($usageCounts[(int) $id] ?? 0) + 1;
                }
            }
        });

        $addons = WebiaAddon::orderBy('name')->get();
        $addons->each(fn (WebiaAddon $addon) => $addon->usage_count = $usageCounts[$addon->id] ?? 0);

        return view('admin.addons.index', ['addons' => $addons]);
    }

    public function toggle(Request $request, WebiaAddon $addon): RedirectResponse|JsonResponse
    {
        $addon->update(['is_active' => ! $addon->is_active]);

        $message = $addon->is_active ? 'Add-on berhasil diaktifkan.' : 'Add-on berhasil dinonaktifkan.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message, 'is_active' => $addon->is_active]);
        }

        return redirect()->route('admin.addons.index')->with('status', $message);
    }

    public function create(): View
    {
        return view('admin.addons.form', ['addon' => new WebiaAddon]);
    }

    public function store(Request $request): RedirectResponse
    {
        WebiaAddon::create($this->validated($request));

        return redirect()->route('admin.addons.index')->with('status', 'Add-on berhasil ditambahkan.');
    }

    public function edit(WebiaAddon $addon): View
    {
        return view('admin.addons.form', compact('addon'));
    }

    public function update(Request $request, WebiaAddon $addon): RedirectResponse
    {
        $addon->update($this->validated($request));

        return redirect()->route('admin.addons.index')->with('status', 'Add-on berhasil diperbarui.');
    }

    public function destroy(WebiaAddon $addon): RedirectResponse
    {
        $addon->delete();

        return redirect()->route('admin.addons.index')->with('status', 'Add-on berhasil dihapus.');
    }

    /** @return array<string, mixed> */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'price' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
