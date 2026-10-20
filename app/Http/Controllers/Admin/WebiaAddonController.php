<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaAddon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebiaAddonController extends Controller
{
    public function index(): View
    {
        return view('admin.addons.index', ['addons' => WebiaAddon::orderBy('name')->get()]);
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
