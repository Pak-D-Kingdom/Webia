
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'My Bookings | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">YOUR VISIT HISTORY</span>
        <h1>My <em>Bookings.</em></h1>
    </div>
</section>

<section class="section">
    <div class="container account-layout">
        @include('website-bisnis.templates.beauty.ruby-luxe.layouts.customer-sidebar')

        <div class="account-content">
            <h2>Appointment history</h2>
            <p>Your confirmed and previous appointments will be listed here.</p>

            <div class="table-scroll">
                <table class="data-table">
                    <thead>
                        <tr><th>Reference</th><th>Treatment</th><th>Date</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="4">No booking data connected yet.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
