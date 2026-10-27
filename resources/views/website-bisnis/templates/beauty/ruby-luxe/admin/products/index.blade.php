
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Manage Products | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">RUBY LUXE ADMINISTRATION</span>
        <h1>Manage <em>Products.</em></h1>
        <p>Manage skincare products, pricing, inventory, and availability.</p>
    </div>
</section>

<section class="section">
    <div class="container admin-panel">
        <div class="section-heading">
            <div>
                <span class="eyebrow">SKINCARE INVENTORY</span>
                <h2>Product <em>Catalog.</em></h2>
            </div>
            <button class="button button-primary" type="button"
                    onclick="alert('Hubungkan ke halaman form tambah produk.')">
                + Add Product
            </button>
        </div>

        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search product..."
                   aria-label="Search products">

            <select id="catalogFilter" aria-label="Filter product category">
                <option value="all">All Categories</option>
                <option value="cleanser">Cleanser</option>
                <option value="serum">Serum</option>
                <option value="moisturizer">Moisturizer</option>
            </select>
        </div>

        @php
            $products = [
                [
                    'name' => 'Botanical Cleanser',
                    'sku' => 'RL-CL-001',
                    'category' => 'cleanser',
                    'price' => 'Rp185.000',
                    'stock' => 35,
                    'status' => 'Active',
                ],
                [
                    'name' => 'Radiance Serum',
                    'sku' => 'RL-SR-001',
                    'category' => 'serum',
                    'price' => 'Rp275.000',
                    'stock' => 8,
                    'status' => 'Active',
                ],
                [
                    'name' => 'Daily Moisturizer',
                    'sku' => 'RL-MZ-001',
                    'category' => 'moisturizer',
                    'price' => 'Rp220.000',
                    'stock' => 0,
                    'status' => 'Out of Stock',
                ],
            ];
        @endphp

        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="catalog-item"
                            data-category="{{ $product['category'] }}"
                            data-search="{{ strtolower($product['name'] . ' ' . $product['sku']) }}">
                            <td><strong>{{ $product['name'] }}</strong></td>
                            <td>{{ $product['sku'] }}</td>
                            <td>{{ ucfirst($product['category']) }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['stock'] }}</td>
                            <td>
                                <span class="admin-status {{ strtolower(str_replace(' ', '-', $product['status'])) }}">
                                    {{ $product['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="admin-actions">
                                    <button type="button" class="admin-action"
                                            onclick="alert('Hubungkan ke halaman edit produk.')">
                                        Edit
                                    </button>
                                    <button type="button" class="admin-action danger"
                                            onclick="alert('Hubungkan ke proses hapus produk.')">
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
            SKU, harga, dan stok merupakan data dummy untuk preview tampilan.
        </p>
    </div>
</section>
@endsection
