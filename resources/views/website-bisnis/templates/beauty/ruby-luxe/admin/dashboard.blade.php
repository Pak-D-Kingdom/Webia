
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Admin Dashboard | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">RUBY LUXE MANAGEMENT</span>
        <h1>Admin <em>Dashboard.</em></h1>
        <p>Manage the website's daily operations from one place.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="admin-layout">
            <aside class="admin-sidebar">
                <strong>MANAGEMENT</strong>
                <a href="{{ url('/templates/ruby-luxe/admin') }}">Overview</a>
                <a href="{{ url('/templates/ruby-luxe/admin/treatments') }}">Treatments</a>
                <a href="{{ url('/templates/ruby-luxe/admin/products') }}">Products & Stock</a>
                <a href="{{ url('/templates/ruby-luxe/admin/bookings') }}">Bookings</a>
                <a href="{{ url('/templates/ruby-luxe/admin/orders') }}">Orders</a>
                <a href="{{ url('/templates/ruby-luxe/admin/articles') }}">Articles</a>
            </aside>

            <div class="admin-content">
                <div class="account-stats">
                    <div class="account-stat">
                        <span>Total bookings</span><strong>—</strong>
                    </div>
                    <div class="account-stat">
                        <span>Product orders</span><strong>—</strong>
                    </div>
                    <div class="account-stat">
                        <span>Published articles</span><strong>—</strong>
                    </div>
                    <div class="account-stat">
                        <span>Active products</span><strong>—</strong>
                    </div>
                </div>

                <div class="admin-panel">
                    <h2>Management overview</h2>
                    <p>
                        Connect the dashboard to real booking, product,
                        order, and article records to display operational data.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
