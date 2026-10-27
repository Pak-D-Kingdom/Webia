
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Manage Articles | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">EDITORIAL MANAGEMENT</span>
        <h1>Manage <em>Articles.</em></h1>
        <p>Manage skincare education, beauty stories, and journal content.</p>
    </div>
</section>

<section class="section">
    <div class="container admin-panel">
        <div class="section-heading">
            <div>
                <span class="eyebrow">BEAUTY JOURNAL</span>
                <h2>Article <em>Library.</em></h2>
            </div>
            <button class="button button-primary" type="button"
                    onclick="alert('Hubungkan ke halaman form artikel baru.')">
                + Create Article
            </button>
        </div>

        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search article..."
                   aria-label="Search articles">

            <select id="catalogFilter" aria-label="Filter article status">
                <option value="all">All Categories</option>
                <option value="skincare">Skincare Basics</option>
                <option value="ingredients">Ingredients</option>
                <option value="treatment">Treatment Guide</option>
            </select>
        </div>

        @php
            $articles = [
                [
                    'title' => 'Building a Simple Skincare Routine',
                    'slug' => 'skincare-routine',
                    'category' => 'skincare',
                    'author' => 'Ruby Luxe Editorial',
                    'date' => '2026-10-18',
                    'status' => 'Published',
                ],
                [
                    'title' => 'Understanding Botanical Ingredients',
                    'slug' => 'botanical-ingredients',
                    'category' => 'ingredients',
                    'author' => 'Ruby Luxe Editorial',
                    'date' => '2026-10-20',
                    'status' => 'Draft',
                ],
                [
                    'title' => 'Preparing for Your First Facial',
                    'slug' => 'first-facial',
                    'category' => 'treatment',
                    'author' => 'Ruby Luxe Editorial',
                    'date' => '2026-10-22',
                    'status' => 'Published',
                ],
            ];
        @endphp

        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Article Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="catalog-item"
                            data-category="{{ $article['category'] }}"
                            data-search="{{ strtolower($article['title'] . ' ' . $article['author']) }}">
                            <td>
                                <strong>{{ $article['title'] }}</strong>
                                <div class="admin-slug">{{ $article['slug'] }}</div>
                            </td>
                            <td>{{ ucfirst($article['category']) }}</td>
                            <td>{{ $article['author'] }}</td>
                            <td>{{ $article['date'] }}</td>
                            <td>
                                <span class="admin-status {{ strtolower($article['status']) }}">
                                    {{ $article['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="admin-actions">
                                    <button type="button" class="admin-action"
                                            onclick="alert('Hubungkan ke editor artikel.')">
                                        Edit
                                    </button>
                                    <button type="button" class="admin-action danger"
                                            onclick="alert('Hubungkan ke proses hapus artikel.')">
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
            Artikel ditampilkan menggunakan data dummy. Hubungkan ke database
            dan editor konten untuk mengelola artikel yang sebenarnya.
        </p>
    </div>
</section>
@endsection
