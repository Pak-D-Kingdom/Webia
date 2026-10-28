<?php

/*
|--------------------------------------------------------------------------
| Template · Property · Luxury · Real Estate Agency (Emerald Green)
|--------------------------------------------------------------------------
| Akses : config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency')
|
| Semua konten halaman (teks, menu, properti, blog, FAQ AI, dsb.) ada di file ini.
| Tim backend cukup mengganti isinya dengan data dari database/controller
| tanpa menyentuh Blade.
|
| Tiap properti di 'properties' punya halaman detail sendiri:
|   /property/{slug}  (slug = key array, mis. 'modern-luxury-villa-bukit-indah')
| Properti pertama = properti utama (dipakai di hero & beranda).
|
| CATATAN: properti ke-2 dan ke-3, artikel blog, teks About Us dan opsi pembayaran
| adalah DATA CONTOH (dummy). Ganti sesuai data klien.
| Nama file gambar relatif terhadap folder 'images'.
*/

$site = [
    'name'    => 'GreenHaven',
    'tagline' => 'Premium Real Estate',
    'address' => 'Jl. Melati No. 12, Jakarta Selatan',
    'email'   => 'hello@greenhaven.co.id',
    'phone'   => '+62 812 3456 7890',
    'hours'   => 'Mon - Sun 09:00 - 18:00',
    'social'  => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
    ],
];

/* ---------------------------------------------------------------------------
 | Pembantu: dari "fakta" sebuah properti dibentuk highlight, spesifikasi,
 | fasilitas, dan rincian harga, sehingga cukup mengisi $facts per properti.
 * ------------------------------------------------------------------------- */
$highlights = fn (array $f): array => [
    ['icon' => 'bed',  'label' => $f['bedrooms'] . ' Bedrooms'],
    ['icon' => 'bath', 'label' => $f['bathrooms'] . ' Bathrooms'],
    ['icon' => 'car',  'label' => $f['carport'] . ' Carport'],
    ['icon' => 'land', 'label' => $f['land'] . ' m² Land'],
];

$specs = fn (array $f): array => [
    ['icon' => 'home',     'label' => 'Property Type', 'value' => $f['type']],
    ['icon' => 'land',     'label' => 'Land Area',     'value' => $f['land'] . ' m²'],
    ['icon' => 'building', 'label' => 'Building Area', 'value' => $f['building'] . ' m²'],
    ['icon' => 'bed',      'label' => 'Bedrooms',      'value' => $f['bedrooms']],
    ['icon' => 'bath',     'label' => 'Bathrooms',     'value' => $f['bathrooms']],
    ['icon' => 'car',      'label' => 'Carport',       'value' => $f['carport'] . ($f['carport'] > 1 ? ' Cars' : ' Car')],
    ['icon' => 'file',     'label' => 'Certificate',   'value' => $f['certificate']],
    ['icon' => 'calendar', 'label' => 'Year Built',    'value' => $f['year']],
];

$facilities = fn (array $f): array => [
    ['icon' => 'bed',    'label' => $f['bedrooms'] . ' Bedrooms'],
    ['icon' => 'bath',   'label' => $f['bathrooms'] . ' Bathrooms'],
    ['icon' => 'car',    'label' => $f['carport'] . '-Car Carport'],
    ['icon' => 'waves',  'label' => 'Swimming Pool'],
    ['icon' => 'leaf',   'label' => 'Tropical Garden'],
    ['icon' => 'sofa',   'label' => 'Open-Plan Living Area'],
    ['icon' => 'sun',    'label' => $f['view']],
    ['icon' => 'shield', 'label' => 'SHM Certificate'],
];

$priceRows = fn (array $f): array => [
    ['label' => 'Asking Price',            'value' => 'IDR ' . number_format($f['price'], 0, ',', '.')],
    ['label' => 'Price Status',            'value' => $f['price_status']],
    ['label' => 'Price per m² (Land)',     'value' => '≈ IDR ' . number_format($f['price'] / $f['land'], 0, ',', '.')],
    ['label' => 'Price per m² (Building)', 'value' => '≈ IDR ' . number_format($f['price'] / $f['building'], 0, ',', '.')],
];

// Melengkapi data properti dari 'facts'
$build = fn (array $p): array => $p + [
    'price_cur'  => 'IDR',
    'price'      => number_format($p['facts']['price'], 0, ',', '.'),
    'price_note' => '(' . $p['facts']['price_status'] . ')',
    'highlights' => $highlights($p['facts']),
    'specs'      => $specs($p['facts']),
    'facilities' => $facilities($p['facts']),
    'price_rows' => $priceRows($p['facts']),
    'map_image'  => 'map-bali.jpg',
    'maps_url'   => 'https://www.google.com/maps/search/?api=1&query=' . urlencode($p['place_name'] . ' ' . $p['address']),
];

$properties = [

    // ------------------------------------------------------------ properti utama
    'modern-luxury-villa-bukit-indah' => $build([
        'slug'        => 'modern-luxury-villa-bukit-indah',
        'badge'       => 'Featured',
        'hero_badge'  => 'Premium Property',
        'title'       => 'Modern Luxury Villa with Breathtaking View',
        'place'       => 'Bukit Indah Residence, Bali',
        'place_name'  => 'Bukit Indah Residence',
        'place_city'  => 'Bali',
        'address'     => 'Jl. Bukit Indah No. 28, Jimbaran, Kuta Selatan, Bali',
        'card_file'   => 'gallery-1.jpg',
        'card_alt'    => 'Modern luxury villa with swimming pool',
        'more_photos' => 12,
        'facts'       => [
            'type' => 'Villa', 'land' => 450, 'building' => 320, 'bedrooms' => 4, 'bathrooms' => 4, 'carport' => 2,
            'certificate' => 'SHM (Sertifikat Hak Milik)', 'year' => 2022,
            'price' => 12500000000, 'price_status' => 'Negotiable', 'view' => 'Panoramic Sunset View',
        ],
        // Slider hero beranda (counter "01 / 04" dihitung otomatis)
        'slides' => [
            ['file' => 'hero-villa.jpg',     'alt' => 'Modern luxury villa with swimming pool at sunset'],
            ['file' => 'gallery-1.jpg',      'alt' => 'Villa exterior with infinity pool and tropical garden'],
            ['file' => 'booking-living.jpg', 'alt' => 'Open-plan living room facing the garden'],
            ['file' => 'gallery-4.jpg',      'alt' => 'Pool area with sea view'],
        ],
        // Foto pertama = foto utama (besar)
        'gallery' => [
            ['file' => 'gallery-1.jpg', 'alt' => 'Villa exterior with swimming pool at dusk'],
            ['file' => 'gallery-2.jpg', 'alt' => 'Living room with natural light'],
            ['file' => 'gallery-3.jpg', 'alt' => 'Master bedroom'],
            ['file' => 'gallery-4.jpg', 'alt' => 'Pool and garden with sea view'],
            ['file' => 'gallery-5.jpg', 'alt' => 'Sunset view over the coast'],
        ],
    ]),

    // ------------------------------------------------------------ DATA CONTOH
    'tropical-pool-villa-jimbaran' => $build([
        'slug'        => 'tropical-pool-villa-jimbaran',
        'badge'       => 'New',
        'title'       => 'Tropical Pool Villa with Garden View',
        'place'       => 'Jimbaran, Bali',
        'place_name'  => 'Jimbaran Garden Villa',
        'place_city'  => 'Bali',
        'address'     => 'Jl. Raya Uluwatu No. 15, Jimbaran, Kuta Selatan, Bali',
        'card_file'   => 'gallery-4.jpg',
        'card_alt'    => 'Tropical pool villa with sea view',
        'more_photos' => 0,
        'facts'       => [
            'type' => 'Villa', 'land' => 320, 'building' => 240, 'bedrooms' => 3, 'bathrooms' => 3, 'carport' => 1,
            'certificate' => 'SHM (Sertifikat Hak Milik)', 'year' => 2021,
            'price' => 8900000000, 'price_status' => 'Negotiable', 'view' => 'Garden & Sea View',
        ],
        'gallery' => [
            ['file' => 'gallery-4.jpg',      'alt' => 'Pool and garden with sea view'],
            ['file' => 'gallery-2.jpg',      'alt' => 'Living room with natural light'],
            ['file' => 'gallery-3.jpg',      'alt' => 'Master bedroom'],
            ['file' => 'booking-living.jpg', 'alt' => 'Open-plan living room facing the garden'],
            ['file' => 'gallery-5.jpg',      'alt' => 'Sunset view over the coast'],
        ],
    ]),

    'sunset-hillside-residence-uluwatu' => $build([
        'slug'        => 'sunset-hillside-residence-uluwatu',
        'badge'       => 'Exclusive',
        'title'       => 'Sunset Hillside Residence',
        'place'       => 'Uluwatu, Bali',
        'place_name'  => 'Uluwatu Hillside Residence',
        'place_city'  => 'Bali',
        'address'     => 'Jl. Labuansait No. 21, Pecatu, Kuta Selatan, Bali',
        'card_file'   => 'gallery-5.jpg',
        'card_alt'    => 'Hillside residence at sunset',
        'more_photos' => 0,
        'facts'       => [
            'type' => 'Residence', 'land' => 600, 'building' => 450, 'bedrooms' => 5, 'bathrooms' => 5, 'carport' => 3,
            'certificate' => 'SHM (Sertifikat Hak Milik)', 'year' => 2023,
            'price' => 15750000000, 'price_status' => 'Negotiable', 'view' => 'Sunset Ocean View',
        ],
        'gallery' => [
            ['file' => 'gallery-5.jpg',  'alt' => 'Sunset view over the coast'],
            ['file' => 'gallery-4.jpg',  'alt' => 'Pool and garden with sea view'],
            ['file' => 'hero-villa.jpg', 'alt' => 'Residence at sunset'],
            ['file' => 'gallery-2.jpg',  'alt' => 'Living room with natural light'],
            ['file' => 'gallery-3.jpg',  'alt' => 'Master bedroom'],
        ],
    ]),
];

return [

    // Lokasi aset publik (relatif terhadap public/, dipakai dengan asset())
    'paths' => [
        'css'    => 'css/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.css',
        'js'     => 'js/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.js',
        'images' => 'images/website-bisnis/template/property/luxury/real-estate-agency-emerald-green',
    ],

    'site' => $site,

    // Navigasi navbar (atas).
    // 'page' = nama route (tanpa prefix), 'hash' = anchor di halaman tsb, 'key' = penanda menu aktif.
    'nav' => [
        ['label' => 'Home',     'page' => 'index',    'hash' => '#top', 'key' => 'index'],
        ['label' => 'Property', 'page' => 'property', 'hash' => '',     'key' => 'property'],
        ['label' => 'About Us', 'page' => 'about',    'hash' => '',     'key' => 'about'],
        ['label' => 'Gallery',  'page' => 'gallery',  'hash' => '',     'key' => 'gallery'],
        ['label' => 'Blog',     'page' => 'blog',     'hash' => '',     'key' => 'blog'],
        ['label' => 'Contact',  'page' => 'contact',  'hash' => '',     'key' => 'contact'],
    ],

    // Navigasi footer
    'footer_nav' => [
        ['label' => 'Home',     'page' => 'index',    'hash' => '#top'],
        ['label' => 'Property', 'page' => 'property', 'hash' => ''],
        ['label' => 'About Us', 'page' => 'about',    'hash' => ''],
        ['label' => 'Gallery',  'page' => 'gallery',  'hash' => ''],
        ['label' => 'Blog',     'page' => 'blog',     'hash' => ''],
        ['label' => 'Contact',  'page' => 'contact',  'hash' => ''],
    ],

    // Pencarian cepat di navbar: kata kunci => halaman tujuan
    'search' => [
        ['words' => ['property', 'villa', 'listing', 'home', 'properti', 'spec', 'specification', 'bedroom', 'bathroom', 'land', 'building', 'certificate', 'shm', 'spesifikasi', 'price', 'harga', 'cost', 'negotiable', 'payment'], 'page' => 'property', 'hash' => ''],
        ['words' => ['about', 'company', 'tentang'],                                    'page' => 'about',   'hash' => ''],
        ['words' => ['gallery', 'photo', 'photos', 'image', 'foto', 'galeri'],          'page' => 'gallery', 'hash' => ''],
        ['words' => ['booking', 'viewing', 'schedule', 'visit', 'jadwal', 'kunjungan'], 'page' => 'booking', 'hash' => ''],
        ['words' => ['blog', 'article', 'news', 'artikel'],                             'page' => 'blog',    'hash' => ''],
        ['words' => ['contact', 'location', 'map', 'address', 'lokasi', 'alamat', 'peta', 'inquiry', 'inquire', 'message', 'kontak', 'pesan'], 'page' => 'contact', 'hash' => ''],
    ],

    // Judul & subjudul tiap halaman (header halaman & heading preview/section)
    'pages' => [
        'property'      => ['label' => 'Property',      'title' => 'Property Listing',       'subtitle' => 'Discover our curated collection of luxury villas and residences.'],
        'specification' => ['label' => 'Specification', 'title' => 'Property Specification', 'subtitle' => 'Modern design, premium location, and complete facilities.'],
        'about'         => ['label' => 'About Us',      'title' => 'About Us',               'subtitle' => 'The people and principles behind every GreenHaven property.'],
        'gallery'       => ['label' => 'Gallery',       'title' => 'Property Gallery',       'subtitle' => 'Explore the beauty and elegance of this property'],
        'booking'       => ['label' => 'Booking',       'title' => 'Schedule a Private Viewing', 'subtitle' => 'See the property in person and experience its true beauty.'],
        'blog'          => ['label' => 'Blog',          'title' => 'Blog & Insights',        'subtitle' => 'Guides, market notes and inspiration for modern property owners.'],
        'contact'       => ['label' => 'Contact',       'title' => 'Contact Us',             'subtitle' => 'Questions about a property? Our team is ready to help.'],
    ],

    'properties' => $properties,

    'features' => [
        ['icon' => 'pin',      'title' => 'Prime Location',      'text' => 'Strategic and exclusive area'],
        ['icon' => 'building', 'title' => 'Modern Design',       'text' => 'Elegant and functional architecture'],
        ['icon' => 'box',      'title' => 'Complete Facilities', 'text' => 'For your comfort and lifestyle'],
        ['icon' => 'shield',   'title' => 'Secure Investment',   'text' => 'High value and great potential'],
    ],

    'about' => [
        'eyebrow' => 'About GreenHaven',
        'title'   => 'Where luxury meets lasting value',
        'file'    => 'booking-living.jpg',
        'alt'     => 'Elegant living space designed for comfort',
        'text'    => [
            'GreenHaven is a premium real estate agency dedicated to architecture-led villas and residences in exclusive locations. Every property we represent is selected for its design, its setting and its long-term value.',
            'From the first enquiry to a private viewing and beyond, our team guides you with clarity, discretion and care.',
        ],
    ],

    // Opsi pembayaran (umum untuk semua properti): DATA CONTOH
    'payments' => [
        ['icon' => 'check',    'title' => 'Cash Payment',     'text' => 'Full payment with a smooth and transparent closing process.'],
        ['icon' => 'building', 'title' => 'Bank Mortgage',    'text' => 'Financing through a bank of your choice, subject to bank approval.'],
        ['icon' => 'calendar', 'title' => 'Installment Plan', 'text' => 'Payment schedules can be discussed directly with our team.'],
    ],

    // Artikel blog: DATA CONTOH (key array = slug untuk URL /blog/{slug}).
    // 'body' = daftar blok: ['type' => 'h'|'p'|'img', 'text' => ...] (img: 'file' + 'alt').
    'blog' => [
        'checklist-membeli-villa-di-bali' => [
            'slug' => 'checklist-membeli-villa-di-bali', 'file' => 'gallery-3.jpg', 'alt' => 'Bedroom interior',
            'tag' => 'Buying Guide', 'date' => '12 Oct 2026', 'read' => '5 min read',
            'title' => '5 Things to Check Before Buying a Villa in Bali',
            'excerpt' => 'From land status to access roads, a simple checklist to review before you commit.',
            'body' => [
                ['type' => 'p', 'text' => 'Buying a villa is as much about due diligence as it is about design. A calm, methodical checklist helps you compare properties fairly and avoid surprises after the keys are handed over.'],
                ['type' => 'h', 'text' => '1. Confirm the land status and certificate'],
                ['type' => 'p', 'text' => 'Ask to see the certificate and make sure the name, land area and boundaries match what is being offered. A notary or legal adviser can verify the details before any payment is made.'],
                ['type' => 'h', 'text' => '2. Check access, utilities and surroundings'],
                ['type' => 'p', 'text' => 'Visit at different times of day. Look at the road access, water and power supply, drainage and the neighbouring plots, because these shape daily comfort as much as the villa itself.'],
                ['type' => 'img', 'file' => 'gallery-2.jpg', 'alt' => 'Living room with natural light'],
                ['type' => 'h', 'text' => '3. Review the building and its upkeep'],
                ['type' => 'p', 'text' => 'Inspect the structure, roof, pool and fittings, and ask how the property has been maintained. Good records are a strong sign of a well-cared-for home.'],
                ['type' => 'p', 'text' => 'Finally, agree on a clear timeline and payment schedule in writing. Our team is happy to walk you through each step.'],
            ],
        ],
        'mengapa-jimbaran-tetap-diminati' => [
            'slug' => 'mengapa-jimbaran-tetap-diminati', 'file' => 'gallery-5.jpg', 'alt' => 'Sunset coastline',
            'tag' => 'Location', 'date' => '03 Oct 2026', 'read' => '4 min read',
            'title' => 'Why Jimbaran Remains a Sought-After Address',
            'excerpt' => 'Sunsets, beaches and easy access: what makes the area appealing for luxury living.',
            'body' => [
                ['type' => 'p', 'text' => 'Jimbaran has long been associated with calm beaches, warm evenings and some of the island\'s most memorable sunsets. For many owners, that combination is exactly what a second home should offer.'],
                ['type' => 'h', 'text' => 'A coastline made for slow living'],
                ['type' => 'p', 'text' => 'Wide bays, seaside dining and open skies create a relaxed rhythm that feels far from the city, while still being within reach of the services you need.'],
                ['type' => 'img', 'file' => 'gallery-4.jpg', 'alt' => 'Pool and garden with sea view'],
                ['type' => 'h', 'text' => 'Convenience without compromise'],
                ['type' => 'p', 'text' => 'Good road connections and nearby amenities make everyday life easy, whether you are staying for a season or hosting guests throughout the year.'],
                ['type' => 'p', 'text' => 'If you would like to see the area for yourself, book a private viewing and our team will arrange a visit.'],
            ],
        ],
        'memahami-sertifikat-shm-dan-hgb' => [
            'slug' => 'memahami-sertifikat-shm-dan-hgb', 'file' => 'hero-villa.jpg', 'alt' => 'Villa at sunset',
            'tag' => 'Legal', 'date' => '25 Sep 2026', 'read' => '6 min read',
            'title' => 'SHM and HGB: Understanding Property Certificates',
            'excerpt' => 'A short guide to common land certificates and what they mean for buyers.',
            'body' => [
                ['type' => 'p', 'text' => 'Two certificate types come up most often when buying property in Indonesia: SHM and HGB. Knowing the difference helps you ask the right questions early.'],
                ['type' => 'h', 'text' => 'SHM (Sertifikat Hak Milik)'],
                ['type' => 'p', 'text' => 'SHM is the strongest form of land title, granting full ownership rights to the holder. It is the certificate attached to the villa featured on this website.'],
                ['type' => 'h', 'text' => 'HGB (Hak Guna Bangunan)'],
                ['type' => 'p', 'text' => 'HGB gives the right to build on and use a plot for a defined period, which can usually be extended under the applicable rules. It is common for developments and commercial plots.'],
                ['type' => 'p', 'text' => 'This article is a general introduction only. For any purchase, please consult a notary or legal adviser to confirm the exact status of the property.'],
            ],
        ],
        'desain-tropis-indoor-outdoor' => [
            'slug' => 'desain-tropis-indoor-outdoor', 'file' => 'gallery-2.jpg', 'alt' => 'Living room',
            'tag' => 'Design', 'date' => '14 Sep 2026', 'read' => '4 min read',
            'title' => 'Designing for Tropical Indoor-Outdoor Living',
            'excerpt' => 'Open plans, natural materials and light: ideas that make a villa feel effortless.',
            'body' => [
                ['type' => 'p', 'text' => 'In a tropical setting, the best homes dissolve the line between inside and outside. Large openings, shaded terraces and garden views make every room feel larger and calmer.'],
                ['type' => 'h', 'text' => 'Let natural materials lead'],
                ['type' => 'p', 'text' => 'Warm timber, stone and linen age gracefully and keep a space feeling grounded. Paired with soft lighting, they create the relaxed luxury that defines modern villas.'],
                ['type' => 'img', 'file' => 'booking-living.jpg', 'alt' => 'Open-plan living room facing the garden'],
                ['type' => 'h', 'text' => 'Plan for light and airflow'],
                ['type' => 'p', 'text' => 'Cross-ventilation, deep overhangs and sliding glazing keep interiors comfortable while framing the landscape beyond.'],
            ],
        ],
        'persiapan-private-viewing' => [
            'slug' => 'persiapan-private-viewing', 'file' => 'booking-living.jpg', 'alt' => 'Open living room',
            'tag' => 'Tips', 'date' => '02 Sep 2026', 'read' => '3 min read',
            'title' => 'How to Prepare for a Private Property Viewing',
            'excerpt' => 'Questions to ask and details to notice when you visit a property in person.',
            'body' => [
                ['type' => 'p', 'text' => 'A private viewing is your chance to feel the property beyond the photographs. A little preparation helps you make the most of every minute.'],
                ['type' => 'h', 'text' => 'Bring a short list of questions'],
                ['type' => 'p', 'text' => 'Think about maintenance history, running costs, neighbours, and what is included in the sale. Writing them down keeps the conversation focused.'],
                ['type' => 'h', 'text' => 'Notice the small things'],
                ['type' => 'p', 'text' => 'Pay attention to natural light, noise, water pressure and storage. Take photos and notes so you can compare properties later.'],
                ['type' => 'p', 'text' => 'Ready to visit? Use the Booking / Viewing form and our team will confirm a time with you.'],
            ],
        ],
        'hal-yang-perlu-diketahui-pemilik-villa' => [
            'slug' => 'hal-yang-perlu-diketahui-pemilik-villa', 'file' => 'gallery-4.jpg', 'alt' => 'Pool and garden',
            'tag' => 'Investment', 'date' => '20 Aug 2026', 'read' => '5 min read',
            'title' => 'Villa Ownership: What to Know Before You Invest',
            'excerpt' => 'Costs, upkeep and long-term considerations for first-time villa owners.',
            'body' => [
                ['type' => 'p', 'text' => 'Owning a villa is rewarding, and it helps to go in with realistic expectations about both the costs and the care involved.'],
                ['type' => 'h', 'text' => 'Plan for upkeep'],
                ['type' => 'p', 'text' => 'Pools, gardens and tropical weather all need regular attention. Budget for routine maintenance and consider a trusted property manager if you will not be on site.'],
                ['type' => 'img', 'file' => 'gallery-3.jpg', 'alt' => 'Master bedroom'],
                ['type' => 'h', 'text' => 'Think long term'],
                ['type' => 'p', 'text' => 'Consider how you will use the property, how your needs may change, and what the exit options look like. Clear answers now make decisions easier later.'],
                ['type' => 'p', 'text' => 'This article is general information, not financial or legal advice.'],
            ],
        ],
    ],

    // Gambar latar header tiap halaman (halaman detail memakai foto properti / artikel sendiri)
    'header_images' => [
        'property' => 'header-property.jpg',
        'about'    => 'header-about.jpg',
        'gallery'  => 'header-gallery.jpg',
        'booking'  => 'header-booking.jpg',
        'blog'     => 'header-blog.jpg',
        'contact'  => 'header-contact.jpg',
    ],

    'inquiry' => [
        'eyebrow' => 'Get in touch',
        'title'   => 'Inquire Now',
        'text'    => 'Get more information about this property. Our team is ready to assist you.',
    ],

    // WhatsApp: tombol mengambang, form Inquiry, form Booking dan FAQ AI memakai nomor ini.
    // Format internasional tanpa + / spasi (0895630300345 -> 62895630300345).
    // Pesan tombol mengambang: %s pertama = judul properti, %s kedua = lokasi.
    'whatsapp' => [
        'number'  => '62895630300345',
        'label'   => 'Chat via WhatsApp',
        'message' => 'Halo GreenHaven, saya tertarik dengan %s di %s.',
        // Kalimat pembuka pesan yang dikirim form ke WhatsApp
        'inquiry_intro' => 'Halo GreenHaven, saya ingin bertanya tentang properti berikut:',
        'booking_intro' => 'Halo GreenHaven, saya ingin menjadwalkan kunjungan (viewing) ke properti berikut:',
        'ai_intro'      => 'Halo GreenHaven, saya punya pertanyaan:',
    ],

    // Jam kunjungan: 09:00 - 17:30, tiap 30 menit
    'time_slots' => array_map(
        fn (int $m): string => sprintf('%02d:%02d', intdiv($m, 60), $m % 60),
        range(9 * 60, 17 * 60 + 30, 30)
    ),

    // AI Property Assistant (FAQ statis; ganti dengan endpoint AI bila backend siap).
    // Token {title} {price} {address} {land} {building} {bedrooms} {bathrooms} {carport} {year}
    // {certificate} otomatis diganti sesuai properti yang sedang dilihat.
    'assistant' => [
        'greeting' => 'Siap membantu Anda menemukan properti impian!',
        'teaser'   => 'Tanya saya tentang properti ini',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang tepat. Silakan kirim pertanyaan lewat form "Inquire Now" atau hubungi tim kami di ' . $site['phone'] . '.',
        'faq' => [
            ['q' => 'Properti ini masih tersedia?', 'chip' => true,
             'keys' => ['tersedia', 'available', 'ready', 'dijual', 'masih', 'terjual'],
             'a' => 'Ya, {title} masih tersedia. Kirim pesan lewat form "Inquire Now" atau jadwalkan kunjungan agar tim kami memastikan ketersediaan terbaru.'],
            ['q' => 'Apa saja fasilitas yang tersedia?', 'chip' => true,
             'keys' => ['fasilitas', 'facilities', 'kolam', 'pool', 'taman', 'garden', 'furnish'],
             'a' => 'Properti ini memiliki {bedrooms} kamar tidur, {bathrooms} kamar mandi, carport untuk {carport} mobil, kolam renang, taman tropis, serta area living terbuka dengan pemandangan.'],
            ['q' => 'Bagaimana cara booking/viewing?', 'chip' => true,
             'keys' => ['booking', 'viewing', 'kunjungan', 'survei', 'survey', 'jadwal', 'lihat', 'datang', 'cara'],
             'a' => 'Pilih tanggal dan jam kunjungan pada bagian Booking / Viewing, lalu kirim permintaan. Jam kunjungan: Senin - Minggu, 09:00 - 18:00.'],
            ['q' => 'Berapa harga terendah di area ini?', 'chip' => true,
             'keys' => ['harga', 'price', 'nego', 'negotiable', 'berapa', 'murah', 'terendah', 'cicilan', 'kpr'],
             'a' => 'Harga {title} adalah {price}. Untuk perbandingan properti lain di area ini, silakan hubungi tim kami di ' . $site['phone'] . '.'],
            ['q' => 'Di mana lokasinya?',
             'keys' => ['lokasi', 'location', 'alamat', 'address', 'dimana', 'map', 'peta', 'jimbaran', 'bali'],
             'a' => 'Properti berada di {address}. Gunakan tombol "Open in Google Maps" pada bagian lokasi untuk petunjuk arah.'],
            ['q' => 'Berapa luas tanah dan bangunan?',
             'keys' => ['luas', 'tanah', 'bangunan', 'kamar', 'land', 'building', 'bedroom', 'bathroom', 'spesifikasi'],
             'a' => 'Luas tanah {land} m² dan luas bangunan {building} m², dengan {bedrooms} kamar tidur, {bathrooms} kamar mandi, dan carport {carport} mobil. Dibangun tahun {year}.'],
            ['q' => 'Apa jenis sertifikatnya?',
             'keys' => ['sertifikat', 'shm', 'certificate', 'legal', 'surat', 'hak milik'],
             'a' => 'Properti ini memiliki sertifikat {certificate}.'],
            ['q' => 'Bagaimana cara menghubungi tim?',
             'keys' => ['hubungi', 'kontak', 'contact', 'telepon', 'telp', 'whatsapp', 'wa', 'email', 'jam', 'buka'],
             'a' => 'Anda bisa menghubungi kami di ' . $site['phone'] . ' atau ' . $site['email'] . ', setiap hari pukul 09:00 - 18:00.'],
        ],
    ],
];
