<?php

return [
    'themes' => [
        'artistic' => [
            'name' => 'Tidal Detail Co.',
            'label' => 'ARTISTIC / OCEAN BLUE',
            'class' => 'theme-artistic',
            'title' => 'Detailing that moves with you.',
            'eyebrow' => 'AUTO DETAILING · EST. 2014',
            'intro' => 'Perawatan kendaraan dengan energi baru. Bersih lebih dalam, kilau lebih berani, dan siap untuk setiap perjalanan.',
            'hero_image' => 'automotive2.png',
            'logo_mark' => 'TD',
            'phone' => 'Mon–Sat · 08:00–18:00',
            'accent_label' => 'OCEAN BLUE',
            'stats' => [
                ['value' => '10+', 'label' => 'tahun pengalaman'],
                ['value' => '2.4k', 'label' => 'mobil dirawat'],
                ['value' => '4.9/5', 'label' => 'rating pelanggan'],
            ],
            'services' => [
                ['number' => '01', 'name' => 'Deep Clean', 'desc' => 'Interior reset dan exterior wash untuk mengembalikan rasa fresh kendaraan.', 'price' => 'Mulai 350K'],
                ['number' => '02', 'name' => 'Paint Revival', 'desc' => 'Decontamination dan paint enhancement untuk warna yang kembali hidup.', 'price' => 'Mulai 850K'],
                ['number' => '03', 'name' => 'Hydro Shield', 'desc' => 'Perlindungan hydrophobic untuk menjaga body tetap licin dan mudah dirawat.', 'price' => 'Mulai 1.8JT'],
            ],
            'packages' => [
                ['name' => 'Refresh', 'price' => '350K', 'note' => 'Untuk perawatan rutin', 'items' => ['Exterior foam wash', 'Vacuum interior', 'Tire dressing']],
                ['name' => 'Signature', 'price' => '850K', 'note' => 'Pilihan paling populer', 'items' => ['Semua fitur Refresh', 'Paint decontamination', 'Interior deep clean', 'Spray sealant']],
                ['name' => 'Ocean Shield', 'price' => '2.4JT', 'note' => 'Perlindungan maksimal', 'items' => ['Paint correction', 'Ceramic coating 1 tahun', 'Glass & wheel coating', 'Aftercare kit']],
            ],
            'portfolio' => [
                ['image' => 'automotive.png', 'label' => 'Precision care', 'title' => 'Every surface, considered.'],
                ['image' => 'automotive3.png', 'label' => 'Tools & technique', 'title' => 'The ritual behind the shine.'],
            ],
            'testimonial' => ['quote' => 'Mobil terasa seperti keluar dari showroom lagi. Timnya detail, komunikasinya enak, dan hasilnya tahan lama.', 'name' => 'Raka Pradana', 'meta' => 'BMW 320i · Signature Package'],
        ],
        'luxury' => [
            'name' => 'Noir Atelier',
            'label' => 'LUXURY / DARK MODE',
            'class' => 'theme-luxury',
            'title' => 'The quiet art of a perfect finish.',
            'eyebrow' => 'PRIVATE AUTOMOTIVE CARE',
            'intro' => 'A considered detailing experience for vehicles that deserve more than a wash. Appointment only, finish always exceptional.',
            'hero_image' => 'automotive.png',
            'logo_mark' => 'NA',
            'phone' => 'By appointment · Jakarta Selatan',
            'accent_label' => 'NOIR STANDARD',
            'stats' => [
                ['value' => '12', 'label' => 'certified detailers'],
                ['value' => '01', 'label' => 'vehicle at a time'],
                ['value' => '5 yr', 'label' => 'coating warranty'],
            ],
            'services' => [
                ['number' => 'I', 'name' => 'The Essential', 'desc' => 'A complete reset: contact wash, interior atelier clean, and finishing detail.', 'price' => 'From 1.2M'],
                ['number' => 'II', 'name' => 'Ceramic Atelier', 'desc' => 'Paint correction followed by a hand-applied ceramic system for lasting depth.', 'price' => 'From 6.5M'],
                ['number' => 'III', 'name' => 'PPF Concierge', 'desc' => 'Precision paint protection film for the surfaces that meet the road first.', 'price' => 'From 12M'],
            ],
            'packages' => [
                ['name' => 'Essential', 'price' => '1.2M', 'note' => 'A complete reset', 'items' => ['Two-stage wash', 'Interior atelier clean', 'Leather conditioning']],
                ['name' => 'Ceramic Atelier', 'price' => '6.5M', 'note' => 'Depth that endures', 'items' => ['One-step correction', 'Ceramic coating system', 'Glass & trim protection', '5-year maintenance plan']],
                ['name' => 'PPF Concierge', 'price' => '12M', 'note' => 'Protection, perfected', 'items' => ['Front-end PPF', 'Self-healing film', 'Edges wrapped by hand', 'Annual inspection']],
            ],
            'portfolio' => [
                ['image' => 'automotive2.png', 'label' => 'The process', 'title' => 'Precision is the luxury.'],
                ['image' => 'automotive3.png', 'label' => 'The standard', 'title' => 'Protection without compromise.'],
            ],
            'testimonial' => ['quote' => 'The kind of service where every detail is anticipated. My car has never looked this composed.', 'name' => 'Adrian W.', 'meta' => 'Porsche 911 · Ceramic Atelier'],
        ],
        'minimal' => [
            'name' => 'FORM / Auto Care',
            'label' => 'PREMIUM MINIMAL / BLACK & GOLD',
            'class' => 'theme-minimal',
            'title' => 'Good cars deserve good care.',
            'eyebrow' => 'DETAILING · PROTECTION · TRUST',
            'intro' => 'Perawatan kendaraan premium yang jelas, rapi, dan tepat sasaran. Tidak berlebihan. Hanya hasil yang terlihat.',
            'hero_image' => 'automotive3.png',
            'logo_mark' => 'F/',
            'phone' => 'Senin–Sabtu · 09:00–19:00',
            'accent_label' => 'THE FORM STANDARD',
            'stats' => [
                ['value' => '8 yr', 'label' => 'trusted service'],
                ['value' => '48h', 'label' => 'coating cure'],
                ['value' => '100%', 'label' => 'transparent quote'],
            ],
            'services' => [
                ['number' => '01', 'name' => 'Clean', 'desc' => 'Cuci dan interior detailing untuk kondisi harian yang selalu siap.', 'price' => 'Mulai 300K'],
                ['number' => '02', 'name' => 'Correct', 'desc' => 'Paint correction untuk mengurangi swirl dan mengembalikan kejernihan cat.', 'price' => 'Mulai 1.2JT'],
                ['number' => '03', 'name' => 'Protect', 'desc' => 'Coating dan proteksi permukaan agar hasil detailing bertahan lebih lama.', 'price' => 'Mulai 2.5JT'],
            ],
            'packages' => [
                ['name' => 'Daily', 'price' => '300K', 'note' => 'Perawatan rutin', 'items' => ['Body wash', 'Vacuum interior', 'Tire dressing']],
                ['name' => 'Complete', 'price' => '1.2JT', 'note' => 'Untuk mobil yang siap tampil', 'items' => ['Deep clean exterior', 'Interior detailing', 'Paint enhancement', 'Spray protection']],
                ['name' => 'Protect', 'price' => '2.5JT', 'note' => 'Investasi perlindungan', 'items' => ['Paint correction', 'Ceramic coating', 'Maintenance guide', 'Inspection 30 hari']],
            ],
            'portfolio' => [
                ['image' => 'automotive3.png', 'label' => 'Proof of care', 'title' => 'Details make the difference.'],
                ['image' => 'automotive2.png', 'label' => 'Built with discipline', 'title' => 'A better finish, by design.'],
            ],
            'testimonial' => ['quote' => 'Harga jelas dari awal, pengerjaan rapi, dan mobil saya benar-benar terlihat lebih terawat.', 'name' => 'Nadia S.', 'meta' => 'Honda CR-V · Complete Package'],
        ],
    ],
];
