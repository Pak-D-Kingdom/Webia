<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Membuat ulang seluruh akun demo customer Webia:
     * - Akun Belum Punya Template / Order (Fresh User, Pending Order, In Progress)
     * - Akun Sudah Punya Template (Pixel, Pulse, Nexus, Infinity)
     * - Variasi Kuota AI (Full 100%, Warning ~95%, Normal ~30%, Fresh ~5%)
     */
    public function run(): void
    {
        $packages = WebiaPackage::all()->keyBy('slug');
        $now = Carbon::now();

        // -------------------------------------------------------------
        // 1. AKUN BELUM PUNYA TEMPLATE / WEBSITE AKTIF
        // -------------------------------------------------------------

        // 1.1 Fresh User (0 Order / Belum Pernah Beli Apapun)
        User::updateOrCreate(
            ['email' => 'budi.fresh@gmail.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ]
        );

        // 1.2 Pending Payment (Order Baru Menunggu Pembayaran Midtrans)
        $userPending = User::updateOrCreate(
            ['email' => 'dina.pending@gmail.com'],
            [
                'name' => 'Dina Maharani',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ]
        );
        $tmplBakery = WebiaTemplate::where('slug', 'fnb-bakery-playful-colorful-pastel-mix')->first();
        $pkgPulse = $packages->get('pulse');
        WebiaOrder::updateOrCreate(
            ['order_number' => 'WEB-261104-PEND'],
            [
                'user_id' => $userPending->id,
                'guest_name' => $userPending->name,
                'guest_email' => $userPending->email,
                'webia_package_id' => $pkgPulse?->id ?? 2,
                'package_snapshot' => [
                    'name' => $pkgPulse?->name ?? 'Pulse',
                    'slug' => 'pulse',
                    'price' => 899000,
                    'chatbot_monthly_quota' => 1500,
                ],
                'webia_template_id' => $tmplBakery?->id,
                'template_snapshot' => [
                    'name' => $tmplBakery?->name ?? 'Sweet Crumb Bakery',
                    'slug' => 'fnb-bakery-playful-colorful-pastel-mix',
                    'tag' => 'F&B · Bakery',
                ],
                'category_slug' => 'fnb',
                'status' => 'pending',
                'credential_status' => 'issued',
                'total_price' => 899000,
                'paid_at' => null,
                'business_data' => [
                    'business_name' => 'Sweet Crumb Artisan Bakery',
                    'owner_name' => 'Dina Maharani',
                    'whatsapp' => '081234500001',
                    'city' => 'Bandung',
                ],
                'delivery_status' => 'pending',
                'site_slug' => null,
            ]
        );

        // 1.3 In Progress (Sudah Bayar, Website Sedang Dikerjakan Developer)
        $userProgress = User::updateOrCreate(
            ['email' => 'iwan.progress@gmail.com'],
            [
                'name' => 'Iwan Setiawan',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ]
        );
        $tmplProperty = WebiaTemplate::where('slug', 'property-nature-green')->orWhere('category_slug', 'property')->first();
        WebiaOrder::updateOrCreate(
            ['order_number' => 'WEB-261104-PROG'],
            [
                'user_id' => $userProgress->id,
                'guest_name' => $userProgress->name,
                'guest_email' => $userProgress->email,
                'webia_package_id' => $pkgPulse?->id ?? 2,
                'package_snapshot' => [
                    'name' => 'Pulse',
                    'slug' => 'pulse',
                    'price' => 899000,
                    'chatbot_monthly_quota' => 1500,
                ],
                'webia_template_id' => $tmplProperty?->id,
                'template_snapshot' => [
                    'name' => $tmplProperty?->name ?? 'The Emerald Residence',
                    'slug' => $tmplProperty?->slug ?? 'property-nature-green',
                    'tag' => 'Property · Real Estate',
                ],
                'category_slug' => 'property',
                'status' => 'paid',
                'credential_status' => 'issued',
                'total_price' => 899000,
                'paid_at' => $now->copy()->subDays(2),
                'business_data' => [
                    'business_name' => 'Griya Indah Realty & Residence',
                    'owner_name' => 'Iwan Setiawan',
                    'whatsapp' => '081234500002',
                    'city' => 'Yogyakarta',
                ],
                'delivery_status' => 'in_progress',
                'site_slug' => null, // Belum delivered
            ]
        );

        // -------------------------------------------------------------
        // 2. AKUN SUDAH PUNYA TEMPLATE & WEBSITE DELIVERED (VARIASI PAKET & KUOTA AI)
        // -------------------------------------------------------------

        $ordersConfig = [
            // === PAKET PIXEL (Limit 500 Pesan) ===
            [
                'email' => 'amanda.glow@gmail.com',
                'name' => 'dr. Amanda Putri',
                'business' => 'Glow Aesthetic Clinic & Salon',
                'order_num' => 'WEB-261102-BEAU',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_beauty_01',
                'tmpl_slug' => 'nailart-professional-softpink',
                'cat' => 'beauty',
                'phone' => '08123344001',
            ],
            [
                'email' => 'ruli.rhs@gmail.com',
                'name' => 'Ruli Hidayat',
                'business' => 'Bengkel PakDe Motor Jaya',
                'order_num' => 'WEB-261102-AUTO',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_automotive_01',
                'tmpl_slug' => 'pitstop-garage',
                'cat' => 'automotive',
                'phone' => '08123344002',
            ],
            [
                'email' => 'maya.laundry@gmail.com',
                'name' => 'Maya Indriani',
                'business' => 'Mint Fresh Laundry',
                'order_num' => 'WEB-261102-LAUN',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_laundry_01',
                'tmpl_slug' => 'home-services-laundry-mint-fresh',
                'cat' => 'home-services',
                'phone' => '08123344003',
            ],
            [
                'email' => 'joko.agri@gmail.com',
                'name' => 'Joko Santoso',
                'business' => 'Agriternak Nusantara & Pertanian',
                'order_num' => 'WEB-261102-AGRI',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_agriculture_01',
                'tmpl_slug' => 'agriternak-bold-livestock',
                'cat' => 'agriculture',
                'phone' => '08123344004',
            ],

            // === PAKET PULSE (Limit 1.500 Pesan) ===
            [
                'email' => 'hendra.klinik@gmail.com',
                'name' => 'dr. Hendra Wijaya',
                'business' => 'Klinik Pratama Sehat Bersama',
                'order_num' => 'WEB-261102-HEAL',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_healthcare_01',
                'tmpl_slug' => 'healthcare-dental-azure',
                'cat' => 'healthcare',
                'phone' => '08123344005',
            ],
            [
                'email' => 'siti.selera@gmail.com',
                'name' => 'Siti Rahmawati',
                'business' => 'Resto Selera Nusantara',
                'order_num' => 'WEB-261102-FNB_',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_fnb_01',
                'tmpl_slug' => 'fnb-cafe-minimalis',
                'cat' => 'fnb',
                'phone' => '08123344006',
            ],
            [
                'email' => 'dimas.brand@gmail.com',
                'name' => 'Dimas Prasetya',
                'business' => 'Dimas Prasetya Visuals',
                'order_num' => 'WEB-261102-PERS',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_personal_brand_01',
                'tmpl_slug' => 'the-creator-room',
                'cat' => 'personal-brand',
                'phone' => '08123344007',
            ],

            // === PAKET NEXUS (Limit 2.500 Pesan — Dengan CMS) ===
            [
                'email' => 'fajar.travel@gmail.com',
                'name' => 'Fajar Pratama',
                'business' => 'OceanJourney Travel',
                'order_num' => 'WEB-261102-TRAV',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_travel_01',
                'tmpl_slug' => 'travel-agent-ocean-teal',
                'cat' => 'travel-tourism',
                'phone' => '08123344008',
            ],
            [
                'email' => 'budi.logistik@gmail.com',
                'name' => 'Budi Hartono',
                'business' => 'Swiftly Express Logistics',
                'order_num' => 'WEB-261102-COMP',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_logistics_01',
                'tmpl_slug' => 'delivery-service-emerald-express',
                'cat' => 'transportation-logistics',
                'phone' => '08123344009',
            ],
            [
                'email' => 'hendra.logistik@gmail.com',
                'name' => 'Hendra Setiawan',
                'business' => 'PT Logistik Cepat Makmur',
                'order_num' => 'WEB-261102-CORP',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_company_01',
                'tmpl_slug' => 'moving-company-navy-hearth',
                'cat' => 'transportation-logistics',
                'phone' => '08123344015',
            ],
            [
                'email' => 'denny.furniture@gmail.com',
                'name' => 'Denny Saputra',
                'business' => 'WoodenLane Furniture',
                'order_num' => 'WEB-261102-FURN',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_furniture_01',
                'tmpl_slug' => 'furniture-mocha-cream',
                'cat' => 'interior-architecture',
                'phone' => '08123344010',
            ],

            // === PAKET INFINITY (Limit 5.000 Pesan — Advanced CMS) ===
            [
                'email' => 'cahyo.cendekia@gmail.com',
                'name' => 'Cahyo Wibowo',
                'business' => 'Ruby Academy / Bimbel Cendekia Juara',
                'order_num' => 'WEB-261102-EDUC',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_education_01',
                'tmpl_slug' => 'ruby-academy-classic-school',
                'cat' => 'education',
                'phone' => '08123344011',
            ],
            [
                'email' => 'rahmat.pajak@gmail.com',
                'name' => 'Rahmat Hidayat',
                'business' => 'Konsultan Pajak & Akuntansi Mitra',
                'order_num' => 'WEB-261102-PROF',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_professional_service_01',
                'tmpl_slug' => 'nexa-consulting',
                'cat' => 'professional-service',
                'phone' => '08123344012',
            ],
            [
                'email' => 'kevin.fitness@gmail.com',
                'name' => 'Kevin Pratama',
                'business' => 'IRONPULSE Mega Gym & Athletic Center',
                'order_num' => 'WEB-261102-GYM_',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_fitness_01',
                'tmpl_slug' => 'ironpulse-gym-fitness-center',
                'cat' => 'sports-fitness',
                'phone' => '08123344013',
            ],
            [
                'email' => 'trio.yayasan@gmail.com',
                'name' => 'Trio Wicaksono',
                'business' => 'Yayasan Harapan Untuk Negeri',
                'order_num' => 'WEB-261105-NPO_',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_nonprofit_01',
                'tmpl_slug' => 'foundation-classic-trust',
                'cat' => 'nonprofit-community',
                'phone' => '08123344016',
            ],
        ];

        foreach ($ordersConfig as $cfg) {
            $user = User::updateOrCreate(
                ['email' => $cfg['email']],
                [
                    'name' => $cfg['name'],
                    'password' => Hash::make('password123'),
                    'role' => 'customer',
                ]
            );

            $pkg = $packages->get($cfg['pkg_slug']);
            $tmpl = WebiaTemplate::where('slug', $cfg['tmpl_slug'])->first();

            WebiaOrder::updateOrCreate(
                ['order_number' => $cfg['order_num']],
                [
                    'user_id' => $user->id,
                    'guest_name' => $user->name,
                    'guest_email' => $user->email,
                    'webia_package_id' => $pkg?->id ?? 1,
                    'package_snapshot' => [
                        'name' => $pkg?->name ?? ucfirst($cfg['pkg_slug']),
                        'slug' => $cfg['pkg_slug'],
                        'price' => $pkg?->price ?? 499000,
                        'chatbot_monthly_quota' => $pkg?->chatbot_monthly_quota ?? 500,
                    ],
                    'webia_template_id' => $tmpl?->id,
                    'template_snapshot' => [
                        'name' => $tmpl?->name ?? $cfg['business'],
                        'slug' => $cfg['tmpl_slug'],
                        'tag' => ucfirst($cfg['cat']),
                    ],
                    'category_slug' => $cfg['cat'],
                    'status' => 'paid',
                    'credential_status' => 'issued',
                    'total_price' => $pkg?->price ?? 499000,
                    'paid_at' => $now->copy()->subDays(5),
                    'business_data' => [
                        'business_name' => $cfg['business'],
                        'owner_name' => $cfg['name'],
                        'whatsapp' => $cfg['phone'],
                        'city' => 'Surabaya',
                    ],
                    'delivery_status' => 'delivered',
                    'site_slug' => $cfg['site_slug'],
                ]
            );
        }
    }
}
