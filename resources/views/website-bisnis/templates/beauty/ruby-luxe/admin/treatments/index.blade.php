
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Manage Treatments | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">RUBY LUXE ADMINISTRATION</span>
        <h1>Manage <em>Treatments.</em></h1>
        <p>Manage beauty treatments, categories, pricing, and availability.</p>
    </div>
</section>

<section class="section">
    <div class="container admin-panel">
        <div class="section-heading">
            <div>
                <span class="eyebrow">TREATMENT CATALOG</span>
                <h2>Treatment <em>Overview.</em></h2>
            </div>
            <button class="button button-primary" type="button"
                    onclick="alert('Hubungkan ke halaman form tambah treatment.')">
                + Add Treatment
            </button>
        </div>

        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search treatment..."
                   aria-label="Search treatments">

            <select id="catalogFilter" aria-label="Filter treatment status">
                <option value="all">All Categories</option>
                <option value="facial">Facial Care</option>
                <option value="advanced">Advanced Care</option>
                <option value="botanical">Botanical Care</option>
            </select>
        </div>

        @php
            $treatments = [
                [
                    'name' => 'Signature Facial',
                    'category' => 'facial',
                    'duration' => '60 minutes',
                    'price' => 'Rp350.000',
                    'status' => 'Published',
                ],
                [
                    'name' => 'Skin Renewal',
                    'category' => 'advanced',
                    'duration' => '75 minutes',
                    'price' => 'Rp500.000',
                    'status' => 'Published',
                ],
                [
                    'name' => 'Botanical Ritual',
                    'category' => 'botanical',
                    'duration' => '60 minutes',
                    'price' => 'Rp400.000',
                    'status' => 'Draft',
                ],
            ];
        @endphp

        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Treatment</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="treatmentAdminRows">
                    @foreach ($treatments as $treatment)
                        <tr class="catalog-item"
                            data-category="{{ $treatment['category'] }}"
                            data-search="{{ strtolower($treatment['name']) }}">
                            <td><strong>{{ $treatment['name'] }}</strong></td>
                            <td>{{ ucfirst($treatment['category']) }}</td>
                            <td>{{ $treatment['duration'] }}</td>
                            <td>{{ $treatment['price'] }}</td>
                            <td>
                                <span class="admin-status {{ strtolower($treatment['status']) }}">
                                    {{ $treatment['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="admin-actions">
                                    <button type="button" class="admin-action"
                                            onclick="alert('Hubungkan ke halaman edit treatment.')">
                                        Edit
                                    </button>
                                    <button type="button" class="admin-action danger"
                                            onclick="alert('Hubungkan ke proses hapus treatment.')">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="disclaimer">
            Harga dan data di atas hanya contoh. Ganti dengan data treatment
            sebenarnya sebelum website dipublikasikan.
        </p>
    </div>
</section>
@endsection
