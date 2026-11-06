{{--
    TENTANG KAMI — halaman sendiri
    Urutan bagian: header halaman, tentang kami, sertifikasi + klien, kontak + penawaran.
--}}
@extends('website-bisnis.template.company.classic.company-profile-warm-neutral.layouts.app', [
    'pageKey'    => 'tentang',
    'pageTitle'  => 'Tentang Kami',
    'pageDesc'   => 'Kenali Nusantara Kreasi, partner strategis di bidang kreatif dan teknologi untuk solusi terbaik bisnis Anda.',
    'anchors'    => ['sertifikasi', 'klien', 'kontak', 'penawaran'],
    'pageHeader' => ['title' => 'Tentang Kami', 'subtitle' => 'Partner Strategis untuk Solusi Terbaik'],
    'sections'   => ['page-header', 'about', 'panels-about', 'contact'],
])
