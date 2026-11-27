<?php

/*
|--------------------------------------------------------------------------
| ASTRALY — Digital Asset Marketplace (Creative Tech · Galaxy)
|--------------------------------------------------------------------------
| WEBIA by D-KREASI. Data dummy untuk frontend statis (tanpa database).
| Diakses di view: config('template.digital-products.creative-tech.digital-asset-marketplace-galaksi.digital-asset-marketplace')
*/

// slug, judul, kategori, kreator, harga, harga coret, rating, ulasan, terjual, format, tag, flag, umur (hari)
$rows = [
    ['nebula-spaceship-kit', 'Nebula Spaceship Kit', '3d-models', 'c01', 249000, null, 4.9, 214, 1840, 'FBX · OBJ · BLEND', ['spaceship', 'game', 'sci-fi', 'low-poly'], ['featured', 'trending'], 40],
    ['crystal-planets-pack', 'Crystal Planets Pack', '3d-models', 'c01', 189000, 259000, 4.8, 167, 1320, 'FBX · GLB · BLEND', ['planet', 'crystal', 'game', 'environment'], ['featured', 'new'], 3],
    ['astronaut-lowpoly-rig', 'Astronaut Low-Poly Rig', '3d-models', 'c01', 0, null, 4.7, 530, 5200, 'FBX · BLEND', ['astronaut', 'rig', 'character', 'free'], ['trending'], 90],
    ['cosmos-dashboard-ui-kit', 'Cosmos Dashboard UI Kit', 'ui-kits', 'c02', 329000, 459000, 4.9, 301, 2650, 'FIGMA · FIG', ['dashboard', 'saas', 'dark-mode', 'admin'], ['featured', 'trending', 'editor'], 60],
    ['orbit-mobile-app-ui', 'Orbit Mobile App UI', 'ui-kits', 'c02', 219000, null, 4.7, 122, 980, 'FIGMA · XD', ['mobile', 'app', 'ios', 'android'], ['featured', 'new'], 5],
    ['glassmorphism-components', 'Glassmorphism Components', 'ui-kits', 'c02', 0, null, 4.6, 812, 7400, 'FIGMA · HTML', ['glass', 'components', 'free', 'ui'], ['trending'], 120],
    ['galaxy-saas-landing', 'Galaxy SaaS Landing Template', 'web-templates', 'c03', 399000, null, 4.8, 188, 1510, 'HTML · TAILWIND · BLADE', ['landing', 'saas', 'tailwind', 'laravel'], ['featured'], 75],
    ['nova-portfolio-blade-theme', 'Nova Portfolio Blade Theme', 'web-templates', 'c03', 279000, null, 4.7, 96, 740, 'BLADE · TAILWIND', ['portfolio', 'laravel', 'blade', 'creative'], ['new'], 8],
    ['stellar-store-template', 'Stellar Store Template', 'web-templates', 'c03', 349000, 499000, 4.6, 144, 1120, 'HTML · TAILWIND', ['ecommerce', 'store', 'shop', 'tailwind'], ['trending'], 50],
    ['cosmic-characters-vector', 'Cosmic Characters Vector Set', 'illustrations', 'c04', 159000, null, 4.8, 205, 1630, 'AI · SVG · PNG', ['character', 'vector', 'mascot', 'branding'], ['featured', 'editor'], 70],
    ['astral-backgrounds-pack', 'Astral Backgrounds Pack', 'illustrations', 'c04', 129000, null, 4.7, 133, 1210, 'JPG 8K · PNG', ['background', 'wallpaper', 'galaxy', '8k'], ['trending', 'new'], 6],
    ['space-doodles-set', 'Space Doodles Set', 'illustrations', 'c04', 0, null, 4.5, 640, 6100, 'SVG · PNG', ['doodle', 'free', 'sticker', 'vector'], [], 150],
    ['neon-glyph-icons', 'Neon Glyph 1.200 Icons', 'icons', 'c05', 99000, null, 4.9, 389, 3320, 'SVG · FIGMA · ICONFONT', ['icons', 'neon', 'ui', 'glyph'], ['featured', 'trending'], 80],
    ['duotone-galaxy-icons', 'Duotone Galaxy Icons', 'icons', 'c05', 79000, null, 4.6, 98, 860, 'SVG · PNG', ['duotone', 'icons', 'galaxy', 'web'], ['new'], 10],
    ['micro-line-icons', 'Micro Line Icons', 'icons', 'c05', 0, null, 4.8, 910, 8800, 'SVG · PNG', ['line', 'free', 'minimal', 'icons'], [], 200],
    ['deep-space-ambient-loops', 'Deep Space Ambient Loops', 'audio', 'c06', 149000, null, 4.8, 112, 940, 'WAV · MP3 · STEMS', ['ambient', 'loop', 'cinematic', 'game'], ['featured', 'new'], 4],
    ['synthwave-game-sfx', 'Synthwave Game SFX', 'audio', 'c06', 119000, 169000, 4.7, 87, 710, 'WAV · OGG', ['sfx', 'synthwave', 'game', 'retro'], ['trending'], 45],
    ['lofi-cosmos-beats', 'Lo-fi Cosmos Beats', 'audio', 'c06', 0, null, 4.9, 702, 6900, 'MP3 · WAV', ['lofi', 'beats', 'free', 'stream'], [], 110],
    ['warp-speed-transitions', 'Warp Speed Transitions', 'motion', 'c07', 179000, null, 4.8, 154, 1260, 'MOV · PREMIERE · AE', ['transition', 'video', 'premiere', 'after-effects'], ['featured', 'trending'], 55],
    ['holo-hud-overlays', 'Holo HUD Overlays', 'motion', 'c07', 229000, null, 4.9, 176, 1390, 'MOV 4K · ALPHA', ['hud', 'overlay', 'sci-fi', '4k'], ['featured', 'editor'], 35],
    ['particle-titles-pack', 'Particle Titles Pack', 'motion', 'c07', 139000, 189000, 4.6, 71, 560, 'AEP · MOGRT', ['titles', 'particle', 'intro', 'youtube'], ['new'], 2],
    ['panduan-jualan-aset-digital', 'Panduan Jualan Aset Digital', 'ebooks', 'c08', 0, null, 4.8, 1204, 12900, 'PDF · 124 HALAMAN', ['ebook', 'free', 'bisnis', 'marketplace'], ['trending'], 130],
    ['kelas-blender-kosmik', 'Kelas Blender Kosmik', 'ebooks', 'c08', 299000, 399000, 4.9, 233, 2010, 'VIDEO 12 JAM · PDF', ['kursus', 'blender', '3d', 'belajar'], ['editor', 'trending'], 65],
    ['brand-design-system-playbook', 'Brand & Design System Playbook', 'ebooks', 'c08', 129000, null, 4.7, 90, 830, 'PDF · NOTION · FIGMA', ['brand', 'design-system', 'playbook', 'template'], ['new'], 9],
];

$assets = [];
foreach ($rows as $i => $r) {
    $assets[] = [
        'id' => $i + 1, 'slug' => $r[0], 'title' => $r[1], 'cat' => $r[2], 'creator' => $r[3],
        'price' => $r[4], 'old' => $r[5], 'rating' => $r[6], 'reviews' => $r[7], 'sales' => $r[8],
        'format' => $r[9], 'tags' => $r[10], 'flags' => $r[11], 'days' => $r[12],
        'img' => sprintf('products/p%02d.jpg', $i + 1),
        'size' => number_format(12 + (($i * 53) % 400) / 10, 1, ',', '.') . ' MB',
    ];
}

return [
    'brand' => ['name' => 'Astraly', 'tagline' => 'Marketplace aset digital untuk kreator galaksi', 'email' => 'halo@astraly.id', 'phone' => '+62 895-6303-00345', 'address' => 'Surabaya, Jawa Timur, Indonesia'],
    'base_path' => '/webia/template/digital-products/creative-tech/digital-asset-marketplace-galaksi',
    'assets_path' => [
        'css' => 'css/website-bisnis/template/digital-products/creative-tech/digital-asset-marketplace-galaksi',
        'js' => 'js/website-bisnis/template/digital-products/creative-tech/digital-asset-marketplace-galaksi',
        'images' => 'images/website-bisnis/template/digital-products/creative-tech/digital-asset-marketplace-galaksi',
    ],
    'whatsapp' => ['number' => '62895630300345', 'message' => 'Halo Astraly, saya ingin bertanya tentang aset digital.'],
    'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',

    'icons' => [
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
        'cart' => '<circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M2 3h3l2.6 12.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.5L21 8H6"/>',
        'heart' => '<path d="M20.8 5.6a5.2 5.2 0 0 0-7.4 0L12 7l-1.4-1.4a5.2 5.2 0 0 0-7.4 7.4L12 21.8l8.8-8.8a5.2 5.2 0 0 0 0-7.4z"/>',
        'user' => '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
        'cube' => '<path d="M21 8 12 3 3 8v8l9 5 9-5z"/><path d="m3 8 9 5 9-5M12 13v8"/>',
        'layout' => '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 9h18M9 21V9"/>',
        'code' => '<path d="m8 8-5 4 5 4M16 8l5 4-5 4M14 5l-4 14"/>',
        'palette' => '<path d="M12 3a9 9 0 1 0 0 18c1.5 0 2-1 1.5-2-.6-1.2.2-2.5 1.6-2.5H17a4 4 0 0 0 4-4C21 6.5 17 3 12 3z"/><circle cx="7.5" cy="11" r="1"/><circle cx="10" cy="7" r="1"/><circle cx="15" cy="7.5" r="1"/>',
        'sparkle' => '<path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z"/>',
        'wave' => '<path d="M3 12h2m3-6v12m4-9v6m4-10v14m4-9v4"/>',
        'film' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 4v16M17 4v16M3 9h4M3 15h4M17 9h4M17 15h4"/>',
        'book' => '<path d="M4 5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2z"/><path d="M4 21V5M9 7h6"/>',
        'shield' => '<path d="M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6z"/><path d="m9 12 2 2 4-4"/>',
        'bolt' => '<path d="M13 2 4 14h7l-1 8 9-12h-7z"/>',
        'crown' => '<path d="m3 8 4.5 4L12 5l4.5 7L21 8l-2 11H5z"/>',
        'refresh' => '<path d="M21 12a9 9 0 0 1-15.5 6.2M3 12A9 9 0 0 1 18.5 5.8"/><path d="M18 2v4h-4M6 22v-4h4"/>',
        'wallet' => '<path d="M3 7a2 2 0 0 1 2-2h13v4"/><path d="M3 7v11a2 2 0 0 0 2 2h15V9H5a2 2 0 0 1-2-2z"/><circle cx="16.5" cy="14.5" r="1.2"/>',
        'chat' => '<path d="M21 12a8 8 0 0 1-11.6 7.1L3 20l1-4.6A8 8 0 1 1 21 12z"/>',
        'eye' => '<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
        'key' => '<circle cx="8" cy="15" r="4"/><path d="m11 12 9-9M16 7l3 3M14 9l2 2"/>',
        'download' => '<path d="M12 3v12m-5-5 5 5 5-5M4 21h16"/>',
        'upload' => '<path d="M12 16V4m-5 5 5-5 5 5M4 21h16"/>',
        'star' => '<path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/>',
        'check' => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
        'arrow' => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
        'arrow-l' => '<path d="M19 12H5m6-6-6 6 6 6"/>',
        'chev' => '<path d="m6 9 6 6 6-6"/>',
        'menu' => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close' => '<path d="M6 6l12 12M18 6 6 18"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'minus' => '<path d="M5 12h14"/>',
        'play' => '<path d="M7 4.5v15l13-7.5z"/>',
        'send' => '<path d="M22 2 11 13M22 2l-7 20-4-9-9-4z"/>',
        'tag' => '<path d="M3 12V4h8l10 10-8 8z"/><circle cx="7.5" cy="8.5" r="1.2"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'fire' => '<path d="M12 22c4 0 7-2.8 7-7 0-3-2-5-3-7-.6 2-2 3-3 3 0-4-2-7-4-9 0 4-4 6-4 12 0 4.2 3 8 7 8z"/>',
        'gift' => '<rect x="3" y="9" width="18" height="4" rx="1"/><path d="M5 13v8h14v-8M12 9v12M12 9S10.5 4 8 4a2.2 2.2 0 0 0 0 5zm0 0s1.5-5 4-5a2.2 2.2 0 0 1 0 5z"/>',
        'trash' => '<path d="M4 7h16M10 11v6m4-6v6M6 7l1 13h10l1-13M9 7V4h6v3"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3.2 3 14.8 0 18M12 3c-3 3.2-3 14.8 0 18"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'phone' => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2z"/>',
        'pin' => '<path d="M12 22s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12z"/><circle cx="12" cy="10" r="2.5"/>',
        'chart' => '<path d="M3 3v18h18"/><path d="m7 15 4-4 3 3 5-6"/>',
        'settings' => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3m0 14v3M4.2 4.2l2.1 2.1m11.4 11.4 2.1 2.1M2 12h3m14 0h3M4.2 19.8l2.1-2.1m11.4-11.4 2.1-2.1"/>',
        'lock' => '<rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/>',
        'bell' => '<path d="M6 17V11a6 6 0 0 1 12 0v6l2 2H4zM10 21h4"/>',
        'filter' => '<path d="M3 5h18l-7 8v6l-4 2v-8z"/>',
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
        'copy' => '<rect x="8" y="8" width="13" height="13" rx="2"/><path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>',
        'zoom' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5M11 8v6M8 11h6"/>',
        'rocket' => '<path d="M5 15c-1.5 1.5-2 5-2 5s3.5-.5 5-2M12 15l-3-3a22 22 0 0 1 2-4 12 12 0 0 1 11-5c0 3-1 8-5 11a22 22 0 0 1-4 2z"/><circle cx="15" cy="9" r="1.5"/>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>',
        'home' => '<path d="m3 11 9-8 9 8v9a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
        'package' => '<path d="M21 8 12 3 3 8v8l9 5 9-5z"/><path d="m3 8 9 5 9-5M7.5 5.5l9 5"/>',
        'logo' => '<path d="M12 3l2.4 6.6L21 12l-6.6 2.4L12 21l-2.4-6.6L3 12l6.6-2.4z"/>',
    ],

    'topbar' => [
        'promo' => 'Flash Sale Galaksi — diskon hingga 40% + kode ASTRA20 untuk pembelian pertama',
        'links' => [['Bantuan', 'help-center'], ['Jadi Kreator', 'become-a-creator'], ['Langganan', 'subscription-plans']],
    ],

    'nav' => [
        ['label' => 'Beranda', 'href' => ''],
        ['label' => 'Jelajahi', 'href' => 'explore-assets', 'mega' => true],
        ['label' => 'Kreator', 'href' => 'creator-profile', 'children' => [
            ['Profil Kreator', 'creator-profile', 'Lihat portofolio kreator top'],
            ['Jadi Kreator', 'become-a-creator', 'Mulai jual aset digitalmu'],
            ['Dashboard Kreator', 'creator-dashboard', 'Pantau penjualan & payout'],
        ]],
        ['label' => 'Langganan', 'href' => 'subscription-plans'],
        ['label' => 'Blog', 'href' => 'blog'],
        ['label' => 'Bantuan', 'href' => 'help-center', 'children' => [
            ['Pusat Bantuan', 'help-center', 'Panduan & jawaban cepat'],
            ['Tentang Kami', 'about-us', 'Misi dan tim Astraly'],
            ['Hubungi Kami', 'contact-us', 'Tim support siap membantu'],
            ['Legal & Lisensi', 'legal', 'Syarat, privasi, lisensi'],
        ]],
    ],

    'categories' => [
        '3d-models' => ['name' => 'Model 3D', 'icon' => 'cube', 'tone' => 'violet', 'desc' => 'Model, karakter, dan environment siap pakai untuk game, AR, dan render.', 'includes' => ['File sumber + versi game-ready', 'Tekstur PBR hingga 4K', 'Panduan penggunaan di Blender & Unity']],
        'ui-kits' => ['name' => 'UI Kit', 'icon' => 'layout', 'tone' => 'cyan', 'desc' => 'Komponen desain modern untuk dashboard, aplikasi, dan website.', 'includes' => ['Auto-layout & variants', 'Light/dark mode', 'Panduan style & token']],
        'web-templates' => ['name' => 'Template Web', 'icon' => 'code', 'tone' => 'rose', 'desc' => 'Template HTML, Tailwind, dan Blade yang responsif dan mudah dikustomisasi.', 'includes' => ['Kode bersih & modular', 'Responsif mobile–desktop', 'Dokumentasi instalasi']],
        'illustrations' => ['name' => 'Ilustrasi', 'icon' => 'palette', 'tone' => 'amber', 'desc' => 'Ilustrasi vektor, karakter, dan background untuk brand dan konten.', 'includes' => ['Vektor layer terpisah', 'PNG transparan', 'Palet warna siap edit']],
        'icons' => ['name' => 'Paket Ikon', 'icon' => 'sparkle', 'tone' => 'emerald', 'desc' => 'Ikon konsisten dalam banyak gaya untuk antarmuka dan presentasi.', 'includes' => ['SVG & icon font', 'Grid 24px konsisten', 'Plugin Figma']],
        'audio' => ['name' => 'Audio & Musik', 'icon' => 'wave', 'tone' => 'violet', 'desc' => 'Musik, loop, dan efek suara untuk game, video, dan podcast.', 'includes' => ['Format WAV lossless', 'Stem terpisah', 'Lisensi komersial jelas']],
        'motion' => ['name' => 'Motion & Video', 'icon' => 'film', 'tone' => 'cyan', 'desc' => 'Transisi, overlay, dan title animasi untuk video berkualitas sinematik.', 'includes' => ['Resolusi hingga 4K', 'Alpha channel', 'Preset Premiere & After Effects']],
        'ebooks' => ['name' => 'E-Book & Kursus', 'icon' => 'book', 'tone' => 'rose', 'desc' => 'Panduan, playbook, dan kelas video dari praktisi industri kreatif.', 'includes' => ['PDF & materi video', 'Template latihan', 'Akses selamanya']],
    ],

    'creators' => [
        'c01' => ['name' => 'Nova Pixel', 'handle' => '@novapixel', 'role' => '3D Artist', 'city' => 'Bandung', 'followers' => '18,4K', 'assets' => 46, 'rating' => 4.9, 'avatar' => 'creators/c01.jpg', 'bio' => 'Spesialis model 3D sci-fi dan environment untuk game indie.'],
        'c02' => ['name' => 'Kirana Studio', 'handle' => '@kiranastudio', 'role' => 'UI/UX Designer', 'city' => 'Jakarta', 'followers' => '24,1K', 'assets' => 38, 'rating' => 4.9, 'avatar' => 'creators/c02.jpg', 'bio' => 'Studio desain produk digital untuk SaaS dan aplikasi mobile.'],
        'c03' => ['name' => 'Orbit Labs', 'handle' => '@orbitlabs', 'role' => 'Web Developer', 'city' => 'Yogyakarta', 'followers' => '12,7K', 'assets' => 29, 'rating' => 4.8, 'avatar' => 'creators/c03.jpg', 'bio' => 'Template Laravel, Blade, dan Tailwind yang rapi dan scalable.'],
        'c04' => ['name' => 'Arka Illustra', 'handle' => '@arkaillustra', 'role' => 'Illustrator', 'city' => 'Denpasar', 'followers' => '15,9K', 'assets' => 52, 'rating' => 4.8, 'avatar' => 'creators/c04.jpg', 'bio' => 'Ilustrator karakter dan background bertema kosmik.'],
        'c05' => ['name' => 'Lumen Icons', 'handle' => '@lumenicons', 'role' => 'Icon Designer', 'city' => 'Malang', 'followers' => '9,3K', 'assets' => 61, 'rating' => 4.9, 'avatar' => 'creators/c05.jpg', 'bio' => 'Ribuan ikon pixel-perfect untuk produk digital modern.'],
        'c06' => ['name' => 'Sonic Dune', 'handle' => '@sonicdune', 'role' => 'Sound Designer', 'city' => 'Surabaya', 'followers' => '11,2K', 'assets' => 33, 'rating' => 4.8, 'avatar' => 'creators/c06.jpg', 'bio' => 'Komposer ambient, SFX, dan musik latar untuk kreator konten.'],
        'c07' => ['name' => 'Frame Forge', 'handle' => '@frameforge', 'role' => 'Motion Designer', 'city' => 'Semarang', 'followers' => '13,5K', 'assets' => 27, 'rating' => 4.8, 'avatar' => 'creators/c07.jpg', 'bio' => 'Motion graphics untuk YouTuber, studio, dan agensi.'],
        'c08' => ['name' => 'Pustaka Kosmos', 'handle' => '@pustakakosmos', 'role' => 'Educator', 'city' => 'Jakarta', 'followers' => '21,0K', 'assets' => 19, 'rating' => 4.9, 'avatar' => 'creators/c08.jpg', 'bio' => 'Kelas dan e-book praktis seputar desain, 3D, dan bisnis digital.'],
    ],

    'assets' => $assets,

    'licenses' => [
        'personal' => ['name' => 'Personal', 'mult' => 1, 'desc' => 'Proyek non-komersial & portofolio', 'points' => ['1 pengguna', 'Tanpa monetisasi', 'Update gratis 6 bulan']],
        'commercial' => ['name' => 'Komersial', 'mult' => 2.2, 'desc' => 'Proyek klien & produk berbayar', 'points' => ['Hingga 5 pengguna', 'Proyek klien & produk', 'Update gratis 12 bulan']],
        'extended' => ['name' => 'Extended', 'mult' => 4.5, 'desc' => 'Dijual ulang sebagai bagian produk', 'points' => ['Pengguna tak terbatas', 'Boleh jadi bagian produk dijual', 'Update seumur hidup']],
    ],

    'collections' => [
        ['title' => 'Starter Pack Game Dev', 'desc' => 'Paket aset 3D untuk prototipe game sci-fi dalam hitungan hari.', 'items' => ['nebula-spaceship-kit', 'astronaut-lowpoly-rig', 'crystal-planets-pack'], 'price' => 399000, 'img' => 'collections/col01.jpg', 'tag' => 'Hemat 35%'],
        ['title' => 'UI Designer Toolkit', 'desc' => 'UI kit, komponen kaca, dan ikon neon untuk produk digital kekinian.', 'items' => ['cosmos-dashboard-ui-kit', 'orbit-mobile-app-ui', 'glassmorphism-components', 'neon-glyph-icons'], 'price' => 549000, 'img' => 'collections/col02.jpg', 'tag' => 'Terlaris'],
        ['title' => 'Content Creator Bundle', 'desc' => 'Transisi, overlay HUD, dan musik untuk video yang sinematik.', 'items' => ['warp-speed-transitions', 'holo-hud-overlays', 'particle-titles-pack', 'deep-space-ambient-loops', 'synthwave-game-sfx'], 'price' => 599000, 'img' => 'collections/col03.jpg', 'tag' => 'Hemat 40%'],
        ['title' => 'Belajar & Jualan Digital', 'desc' => 'Dari panduan jualan hingga kelas Blender dan brand playbook.', 'items' => ['panduan-jualan-aset-digital', 'kelas-blender-kosmik', 'brand-design-system-playbook', 'cosmic-characters-vector'], 'price' => 449000, 'img' => 'collections/col04.jpg', 'tag' => 'Baru'],
    ],

    'promos' => [
        'coupons' => [['ASTRA20', 'Diskon 20% pembelian pertama', 'Min. belanja Rp 150.000'], ['GALAXY10', 'Diskon 10% semua kategori', 'Tanpa minimum belanja'], ['BUNDLE50', 'Potongan Rp 50.000 untuk bundle', 'Khusus koleksi & bundle']],
        'ends_in_hours' => 36,
    ],

    'why' => [
        ['shield', 'Lisensi Jelas & Aman', 'Setiap aset punya lisensi tertulis yang siap dipakai untuk proyek pribadi maupun klien.'],
        ['bolt', 'Unduh Instan', 'Bayar, langsung unduh. File tersimpan permanen di perpustakaan unduhanmu.'],
        ['crown', 'Kurasi Ketat', 'Tim editor menyeleksi kualitas setiap aset sebelum tayang di marketplace.'],
        ['refresh', 'Update Gratis', 'Dapatkan versi terbaru aset yang kamu beli tanpa biaya tambahan.'],
        ['wallet', 'Bagi Hasil Adil', 'Kreator mendapat hingga 80% dari setiap penjualan dengan payout mingguan.'],
        ['chat', 'Support Responsif', 'Tim kami dan asisten AI siap membantu 7 hari seminggu lewat chat & WhatsApp.'],
    ],

    'steps' => [
        ['search', 'Cari & Temukan', 'Gunakan pencarian pintar, filter lanjutan, atau rekomendasi AI.'],
        ['eye', 'Preview Aset', 'Lihat pratinjau interaktif, ulasan, dan detail format file.'],
        ['key', 'Pilih Lisensi', 'Personal, Komersial, atau Extended sesuai kebutuhan proyekmu.'],
        ['download', 'Bayar & Unduh', 'Selesaikan pembayaran dan unduh file langsung dari perpustakaanmu.'],
    ],

    'testimonials' => [
        ['Rafi Anggara', 'Indie Game Developer', 'creators/c09.jpg', 5, 'Model 3D-nya rapi dan siap pakai. Prototipe game saya jadi selesai dua minggu lebih cepat.'],
        ['Dewi Wulandari', 'Product Designer', 'creators/c10.jpg', 5, 'UI kit di sini kualitasnya setara studio besar. Lisensi komersialnya jelas, klien pun tenang.'],
        ['Satria Nugraha', 'YouTuber', 'creators/c11.jpg', 5, 'Overlay HUD dan transisinya bikin video saya terlihat sinematik. Proses unduhnya instan.'],
        ['Bunga Tiara', 'Freelance Web Developer', 'creators/c12.jpg', 4, 'Template Blade-nya bersih dan modular. Tinggal ganti konten, selesai.'],
        ['Mayang Sari', 'Content Creator', 'creators/c13.jpg', 5, 'Rekomendasi AI-nya pas sekali. Saya langsung menemukan paket musik yang cocok.'],
        ['Adi Firmansyah', 'Founder Startup', 'creators/c14.jpg', 5, 'Langganan Pro sangat hemat. Semua kebutuhan aset tim kami ada dalam satu tempat.'],
    ],

    'faqs' => [
        ['Apa itu Astraly?', 'Astraly adalah marketplace aset digital tempat kreator menjual model 3D, UI kit, template web, ilustrasi, ikon, audio, motion, hingga e-book dan kursus.'],
        ['Bagaimana cara mengunduh aset yang sudah saya beli?', 'Setelah pembayaran berhasil, aset otomatis muncul di halaman Unduhan Saya dan bisa diunduh kapan saja.'],
        ['Apa perbedaan lisensi Personal, Komersial, dan Extended?', 'Personal untuk proyek non-komersial, Komersial untuk proyek klien atau produk berbayar, Extended jika aset menjadi bagian produk yang dijual ulang.'],
        ['Metode pembayaran apa yang tersedia?', 'Kami menerima transfer bank, QRIS, e-wallet, kartu kredit/debit, dan virtual account.'],
        ['Bisakah saya meminta refund?', 'Refund tersedia dalam 7 hari jika file rusak atau tidak sesuai deskripsi dan belum digunakan secara komersial.'],
        ['Bagaimana cara menjadi kreator?', 'Daftar di halaman Jadi Kreator, lengkapi profil, unggah aset pertama, dan tunggu kurasi tim kami maksimal 2 hari kerja.'],
    ],

    'plans' => [
        ['Starter', 0, 0, 'Untuk mencoba galaksi aset', ['Akses 1.000+ aset gratis', '5 unduhan premium / bulan', 'Lisensi personal', 'Dukungan komunitas'], false],
        ['Pro', 149000, 119000, 'Untuk kreator dan freelancer', ['Unduhan premium tanpa batas', 'Lisensi komersial', 'Diskon 20% semua aset', 'Akses awal aset baru', 'Support prioritas'], true],
        ['Studio', 399000, 319000, 'Untuk tim dan agensi', ['Semua fitur Pro', 'Hingga 10 anggota tim', 'Lisensi extended', 'Invoice & pajak perusahaan', 'Account manager khusus'], false],
    ],

    'posts' => [
        ['Tren Aset 3D 2026: Dari Game Indie hingga AR Commerce', 'Tren', '12 Nov 2026', '6 mnt', 'Model 3D kini dipakai jauh melampaui game — dari katalog produk AR sampai pengalaman virtual.', 'blog/b01.jpg'],
        ['Cara Memilih Lisensi Aset Digital yang Tepat untuk Klien', 'Panduan', '05 Nov 2026', '5 mnt', 'Hindari masalah hukum dengan memahami perbedaan lisensi personal, komersial, dan extended.', 'blog/b02.jpg'],
        ['7 Warna Galaxy untuk UI Gelap yang Tetap Nyaman Dibaca', 'Desain', '29 Okt 2026', '4 mnt', 'Palet ungu, magenta, dan cyan yang aman untuk kontras dan aksesibilitas.', 'blog/b03.jpg'],
        ['Membangun Sound Identity untuk Channel YouTube Kamu', 'Audio', '21 Okt 2026', '7 mnt', 'Musik dan SFX konsisten membuat brand kontenmu mudah dikenali.', 'blog/b04.jpg'],
        ['Kisah Kreator: Dari Hobi Blender ke Penghasilan Tetap', 'Kreator', '14 Okt 2026', '8 mnt', 'Nova Pixel berbagi strategi mengubah hobi 3D menjadi bisnis aset digital berkelanjutan.', 'blog/b05.jpg'],
        ['Template Laravel Blade: Struktur Folder yang Rapi dan Scalable', 'Developer', '07 Okt 2026', '9 mnt', 'Praktik terbaik menata layout, partial, dan komponen untuk proyek Laravel.', 'blog/b06.jpg'],
    ],

    'help' => [
        ['Pembelian & Pembayaran', 'wallet', ['Cara membeli aset', 'Metode pembayaran yang tersedia', 'Menggunakan kode promo', 'Invoice & bukti pembayaran']],
        ['Unduhan & Lisensi', 'download', ['Cara mengunduh aset', 'Memahami jenis lisensi', 'Mengunduh ulang aset', 'Upgrade lisensi']],
        ['Akun & Keamanan', 'user', ['Mengubah profil', 'Reset kata sandi', 'Mengaktifkan verifikasi 2 langkah', 'Menghapus akun']],
        ['Menjadi Kreator', 'crown', ['Syarat menjadi kreator', 'Cara mengunggah aset', 'Bagi hasil & payout', 'Standar kualitas aset']],
        ['Langganan', 'bolt', ['Perbedaan paket langganan', 'Upgrade atau downgrade', 'Membatalkan langganan', 'Penagihan tahunan']],
        ['Refund & Masalah', 'shield', ['Kebijakan refund', 'File rusak atau tidak lengkap', 'Melaporkan pelanggaran', 'Hubungi dukungan']],
    ],

    'legal' => [
        'terms' => ['Syarat & Ketentuan', [['Penerimaan Syarat', 'Dengan menggunakan Astraly, kamu menyetujui syarat layanan ini. Jika tidak setuju, mohon hentikan penggunaan platform.'], ['Akun Pengguna', 'Kamu bertanggung jawab menjaga kerahasiaan akun dan seluruh aktivitas yang terjadi di dalamnya.'], ['Konten & Kekayaan Intelektual', 'Hak cipta aset tetap dimiliki kreator. Pembeli memperoleh lisensi penggunaan sesuai jenis lisensi yang dipilih.'], ['Larangan', 'Dilarang membagikan ulang, menjual kembali file mentah, atau menggunakan aset di luar cakupan lisensi.']]],
        'privacy' => ['Kebijakan Privasi', [['Data yang Kami Kumpulkan', 'Kami mengumpulkan data akun, transaksi, dan preferensi untuk memberikan layanan dan rekomendasi yang relevan.'], ['Penggunaan Data', 'Data digunakan untuk memproses pesanan, meningkatkan layanan, dan mengirim pembaruan yang kamu setujui.'], ['Keamanan', 'Kami menerapkan enkripsi dan kontrol akses untuk melindungi informasi pribadimu.'], ['Hak Pengguna', 'Kamu berhak mengakses, memperbaiki, atau menghapus data pribadimu kapan saja melalui halaman profil atau dukungan.']]],
        'license' => ['Perjanjian Lisensi', [['Lisensi Personal', 'Untuk satu pengguna pada proyek non-komersial seperti portofolio, belajar, dan eksperimen.'], ['Lisensi Komersial', 'Untuk proyek klien atau produk berbayar oleh hingga 5 pengguna, tanpa dijual ulang sebagai aset.'], ['Lisensi Extended', 'Untuk aset yang menjadi bagian dari produk yang dijual ulang atau didistribusikan dalam jumlah besar.'], ['Atribusi', 'Atribusi tidak wajib kecuali disebutkan pada halaman aset tertentu.']]],
        'refund' => ['Kebijakan Refund', [['Syarat Refund', 'Refund dapat diajukan dalam 7 hari jika file rusak, tidak lengkap, atau tidak sesuai deskripsi.'], ['Tidak Berlaku', 'Refund tidak berlaku untuk aset gratis atau aset yang telah digunakan dalam proyek komersial.'], ['Proses', 'Ajukan lewat halaman Hubungi Kami. Tim kami memproses dalam 3 hari kerja.'], ['Pengembalian Dana', 'Dana dikembalikan ke metode pembayaran awal atau saldo kredit Astraly.']]],
    ],

    'ai' => [
        'name' => 'Nova', 'role' => 'Asisten FAQ Astraly',
        'greeting' => 'Halo, aku Nova — asisten galaksi Astraly! Tanyakan soal lisensi, pembayaran, unduhan, atau jadi kreator.',
        'quick' => ['Jenis lisensi apa yang cocok?', 'Cara mengunduh aset', 'Metode pembayaran', 'Cara jadi kreator', 'Kebijakan refund', 'Ada aset gratis?'],
        'kb' => [
            [['lisensi', 'license', 'komersial', 'personal', 'extended'], 'Ada 3 lisensi: Personal (proyek non-komersial), Komersial (proyek klien & produk berbayar, hingga 5 pengguna), dan Extended (aset menjadi bagian produk yang dijual ulang). Pilih di halaman detail aset.'],
            [['unduh', 'download', 'file'], 'Setelah pembayaran, buka halaman Unduhan Saya lalu klik tombol Unduh. File bisa diunduh ulang kapan saja.'],
            [['bayar', 'pembayaran', 'payment', 'qris', 'transfer', 'ewallet'], 'Kami menerima transfer bank, QRIS, e-wallet, kartu kredit/debit, dan virtual account.'],
            [['kreator', 'jual', 'creator', 'seller', 'upload'], 'Daftar di halaman Jadi Kreator, lengkapi profil, unggah aset, lalu tunggu kurasi maksimal 2 hari kerja. Bagi hasil hingga 80%.'],
            [['refund', 'kembali', 'batal'], 'Refund tersedia dalam 7 hari jika file rusak atau tidak sesuai deskripsi dan belum dipakai komersial. Ajukan lewat halaman Hubungi Kami.'],
            [['gratis', 'free'], 'Tentu! Ada banyak aset gratis berlisensi personal. Buka bagian Aset Gratis di beranda atau aktifkan filter Gratis di halaman Jelajahi.'],
            [['langganan', 'subscription', 'paket', 'pro', 'studio'], 'Paket Pro (Rp 149.000/bulan) memberi unduhan premium tanpa batas + lisensi komersial. Studio untuk tim hingga 10 anggota.'],
            [['promo', 'diskon', 'kupon', 'voucher', 'kode'], 'Gunakan kode ASTRA20 untuk diskon 20% pembelian pertama, atau GALAXY10 untuk diskon 10%. Masukkan di halaman Keranjang.'],
            [['rekomendasi', 'saran', 'cocok'], 'Coba fitur Rekomendasi AI di halaman Jelajahi: pilih tujuan dan budget, lalu aku susunkan aset yang paling pas.'],
            [['akun', 'password', 'sandi', 'login', 'profil'], 'Kelola profil dan kata sandi di halaman Profil Saya. Jika lupa sandi, gunakan tautan reset di halaman masuk.'],
            [['wa', 'whatsapp', 'kontak', 'hubungi', 'cs'], 'Hubungi tim kami lewat tombol WhatsApp di pojok kanan bawah atau halaman Hubungi Kami.'],
        ],
        'fallback' => 'Hmm, aku belum menemukan jawabannya. Coba kata kunci lain atau hubungi tim kami via WhatsApp.',
    ],
];
