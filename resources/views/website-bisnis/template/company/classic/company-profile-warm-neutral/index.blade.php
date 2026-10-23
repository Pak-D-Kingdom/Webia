{{--
    BERANDA — Company Profile Classic / Warm Neutral
    Urutan bagian: hero, layanan, preview (portofolio, proyek, sertifikasi, klien), kontak + penawaran.
    Tentang Kami dan Portofolio lengkap ada di halaman masing-masing.
--}}
@extends('website-bisnis.template.company.classic.company-profile-warm-neutral.layouts.app', [
    'pageKey'   => 'beranda',
    'pageTitle' => 'Solusi Kreatif untuk Masa Depan',
    'pageDesc'  => 'Nusantara Kreasi adalah mitra terpercaya dalam menghadirkan solusi kreatif dan inovatif untuk mendukung pertumbuhan bisnis Anda.',
    'anchors'   => ['beranda', 'layanan', 'portofolio', 'proyek', 'sertifikasi', 'klien', 'kontak', 'penawaran'],
    'sections'  => ['hero', 'services', 'panels-home', 'contact'],
])
