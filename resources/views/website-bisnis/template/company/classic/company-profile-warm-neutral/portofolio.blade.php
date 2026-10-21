{{--
    PORTOFOLIO — halaman sendiri
    Urutan bagian: header halaman, portofolio, proyek terbaru, kontak + penawaran.
--}}
@extends('website-bisnis.template.company.classic.company-profile-warm-neutral.layouts.app', [
    'pageKey'    => 'portofolio',
    'pageTitle'  => 'Portofolio',
    'pageDesc'   => 'Karya terbaik Nusantara Kreasi: branding, website, aplikasi mobile, dan desain interior.',
    'anchors'    => ['portofolio', 'proyek', 'kontak', 'penawaran'],
    'pageHeader' => ['title' => 'Portofolio', 'subtitle' => 'Karya terbaik yang telah kami selesaikan'],
    'sections'   => ['page-header', 'portfolio-grid', 'projects-grid', 'contact'],
])
