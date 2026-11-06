
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'My Account | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">YOUR PERSONAL SPACE</span>
        <h1>My <em>Account.</em></h1>
        <p>Manage your bookings and skincare orders.</p>
    </div>
</section>

<section class="section">
    <div class="container account-layout">
        @include('website-bisnis.templates.beauty.ruby-luxe.layouts.customer-sidebar')

        <div class="account-content">
            <h2>Welcome back.</h2>
            <p>Your appointment and order summaries will appear here.</p>

            <div class="account-stats">
                <div class="account-stat"><span>Upcoming bookings</span><strong>—</strong></div>
                <div class="account-stat"><span>Active orders</span><strong>—</strong></div>
                <div class="account-stat"><span>Completed visits</span><strong>—</strong></div>
            </div>

            <p class="disclaimer">
                Summary values will be populated from authenticated
                customer records after backend integration.
            </p>
        </div>
    </div>
</section>
@endsection
