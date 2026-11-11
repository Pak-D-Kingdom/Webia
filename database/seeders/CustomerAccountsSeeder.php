<?php

namespace Database\Seeders;

use App\Models\HostingInvoice;
use App\Models\HostingPayment;
use App\Models\HostingPriceChange;
use App\Models\HostingService;
use App\Models\HostingTask;
use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use App\Services\AiQuotaService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDO;

class CustomerAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Membuat ulang seluruh akun demo customer Webia dengan seluruh variasi kemungkinan:
     * - Status Order & Lifecycle (Fresh 0 Order, Pending Payment, Payment Uploaded, In Progress)
     * - Variasi Tier Paket AI (Pixel, Pulse, Nexus, Infinity)
     * - Variasi Status Konsumsi Kuota AI (Habis 100%+, Warning 80-99%, Normal 20-50%, Fresh 1-10%)
     * - Variasi Status Tagihan Hosting (Unpaid, Paid, Overdue, Multi-Invoice, Cancelled & Replaced, Non-Hosting)
     */
    public function run(): void
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        // 1. Reset data customer lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        HostingPayment::truncate();
        HostingTask::truncate();
        HostingPriceChange::truncate();
        HostingInvoice::truncate();
        HostingService::truncate();
        WebiaOrder::truncate();
        User::where('role', '!=', 'admin')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Reset SQLite AI app.db
        $sqliteCandidates = [
            config('services.ai_engine.db_path'),
            base_path('../AI-Assistant-DKreasi/data/app.db'),
            'D:/Intern/Kreasi/AI-Assistant-DKreasi/data/app.db',
        ];
        $pdo = null;
        foreach ($sqliteCandidates as $p) {
            if ($p && file_exists($p)) {
                try {
                    $pdo = new PDO("sqlite:{$p}");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->exec("DELETE FROM usages;");
                    $pdo->exec("DELETE FROM tenants;");
                    break;
                } catch (\Throwable $e) {}
            }
        }

        $packages = WebiaPackage::all()->keyBy('slug');
        $pkgPulse = $packages->get('pulse');

        // 2. Akun Non-Delivered (Lifecycle Validasi)
        // 2.1 Fresh User
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.fresh@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'email_verified_at' => $now,
        ]);

        // 2.2 Pending Payment
        $uPending = User::create([
            'name' => 'Dina Maharani',
            'email' => 'dina.pending@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'email_verified_at' => $now,
        ]);
        $tmplPending = WebiaTemplate::where('slug', 'fnb-bakery-playful-colorful-pastel-mix')->orWhere('slug', 'daily-crumb')->first();
        WebiaOrder::create([
            'order_number' => 'WEB-261111-PEND',
            'user_id' => $uPending->id,
            'guest_name' => $uPending->name,
            'guest_email' => $uPending->email,
            'webia_package_id' => $pkgPulse?->id ?? 2,
            'package_snapshot' => [
                'name' => 'Pulse',
                'slug' => 'pulse',
                'price' => 899000,
                'chatbot_monthly_quota' => 1500,
            ],
            'webia_template_id' => $tmplPending?->id,
            'template_snapshot' => [
                'name' => $tmplPending?->name ?? 'Sweet Crumb Bakery',
                'slug' => $tmplPending?->slug ?? 'fnb-bakery-playful-colorful-pastel-mix',
                'tag' => 'F&B · Bakery',
            ],
            'category_slug' => 'fnb',
            'status' => 'pending',
            'credential_status' => 'issued',
            'total_price' => 899000,
            'paid_at' => null,
            'business_data' => [
                'business_name' => 'Sweet Crumb Bakery',
                'owner_name' => 'Dina Maharani',
                'whatsapp' => '081234560001',
                'city' => 'Bandung',
            ],
            'delivery_status' => 'pending',
            'site_slug' => null,
        ]);

        // 2.3 Payment Uploaded
        $uUploaded = User::create([
            'name' => 'Reza Pratama',
            'email' => 'reza.upload@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'email_verified_at' => $now,
        ]);
        $tmplUploaded = WebiaTemplate::where('slug', 'origins-cafe')->orWhere('slug', 'fnb-cafe-minimalis')->first();
        WebiaOrder::create([
            'order_number' => 'WEB-261111-UPLD',
            'user_id' => $uUploaded->id,
            'guest_name' => $uUploaded->name,
            'guest_email' => $uUploaded->email,
            'webia_package_id' => $pkgPulse?->id ?? 2,
            'package_snapshot' => [
                'name' => 'Pulse',
                'slug' => 'pulse',
                'price' => 899000,
                'chatbot_monthly_quota' => 1500,
            ],
            'webia_template_id' => $tmplUploaded?->id,
            'template_snapshot' => [
                'name' => $tmplUploaded?->name ?? 'Origins Cafe',
                'slug' => $tmplUploaded?->slug ?? 'origins-cafe',
                'tag' => 'F&B · Coffee Shop',
            ],
            'category_slug' => 'fnb',
            'status' => 'payment_uploaded',
            'credential_status' => 'issued',
            'total_price' => 899000,
            'paid_at' => null,
            'payment_receipt_path' => 'receipts/dummy_receipt.jpg',
            'business_data' => [
                'business_name' => 'Kopi Titik Temu',
                'owner_name' => 'Reza Pratama',
                'whatsapp' => '081234560002',
                'city' => 'Jakarta Selatan',
            ],
            'delivery_status' => 'pending',
            'site_slug' => null,
        ]);

        // 2.4 Website In-Progress
        $uProgress = User::create([
            'name' => 'Iwan Setiawan',
            'email' => 'iwan.progress@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'email_verified_at' => $now,
        ]);
        $tmplProgress = WebiaTemplate::where('slug', 'property-nature-green')->orWhere('slug', 'coral-homes')->first();
        WebiaOrder::create([
            'order_number' => 'WEB-261111-PROG',
            'user_id' => $uProgress->id,
            'guest_name' => $uProgress->name,
            'guest_email' => $uProgress->email,
            'webia_package_id' => $pkgPulse?->id ?? 2,
            'package_snapshot' => [
                'name' => 'Pulse',
                'slug' => 'pulse',
                'price' => 899000,
                'chatbot_monthly_quota' => 1500,
            ],
            'webia_template_id' => $tmplProgress?->id,
            'template_snapshot' => [
                'name' => $tmplProgress?->name ?? 'The Emerald Residence',
                'slug' => $tmplProgress?->slug ?? 'property-nature-green',
                'tag' => 'Property · Real Estate',
            ],
            'category_slug' => 'property',
            'status' => 'paid',
            'credential_status' => 'issued',
            'total_price' => 899000,
            'paid_at' => $now->copy()->subDays(2),
            'business_data' => [
                'business_name' => 'Griya Indah Residence',
                'owner_name' => 'Iwan Setiawan',
                'whatsapp' => '081234560003',
                'city' => 'Yogyakarta',
            ],
            'delivery_status' => 'in_progress',
            'site_slug' => null,
        ]);

        // 3. Matriks 16 Klien Website Selesai (Semua Kemungkinan Hosting & Kuota AI)
        $matrixClients = [
            // === TIER PIXEL (500) ===
            [
                'email' => 'ruli.otomotif@gmail.com',
                'name' => 'Ruli Hidayat',
                'business' => 'Bengkel PakDe Motor Jaya',
                'order_num' => 'WEB-261101-AUTO',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_automotive_01',
                'tmpl_slug' => 'pitstop-garage',
                'cat' => 'automotive',
                'phone' => '081234560101',
                'city' => 'Surabaya',
                'used_quota' => 486, // 97.2% -> WARNING
                'hosting' => [
                    'type' => 'unpaid',
                    'domain' => 'pakdemotor.id',
                    'website' => 'Bengkel PakDe Motor Jaya',
                    'price' => 120000,
                    'cycle_day' => 15,
                    'due_days' => 5,
                ]
            ],
            [
                'email' => 'amanda.klinik@gmail.com',
                'name' => 'dr. Amanda Putri',
                'business' => 'Glow Aesthetic Clinic & Salon',
                'order_num' => 'WEB-261101-BEAU',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_beauty_01',
                'tmpl_slug' => 'nailart-professional-softpink',
                'cat' => 'beauty',
                'phone' => '081234560102',
                'city' => 'Jakarta Selatan',
                'used_quota' => 500, // 100.0% -> HABIS / BLOCKED
                'hosting' => [
                    'type' => 'paid',
                    'domain' => 'glowclinic.id',
                    'website' => 'Glow Aesthetic Clinic',
                    'price' => 150000,
                    'cycle_day' => 5,
                    'paid_days_ago' => 4,
                ]
            ],
            [
                'email' => 'maya.laundry@gmail.com',
                'name' => 'Maya Indriani',
                'business' => 'Mint Fresh Clean Laundry',
                'order_num' => 'WEB-261101-LAUN',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_laundry_01',
                'tmpl_slug' => 'mint-fresh-clean-laundry',
                'cat' => 'services',
                'phone' => '081234560103',
                'city' => 'Semarang',
                'used_quota' => 180, // 36.0% -> NORMAL
                'hosting' => [
                    'type' => 'overdue',
                    'domain' => 'mintfreshlaundry.com',
                    'website' => 'Mint Fresh Clean Laundry',
                    'price' => 100000,
                    'cycle_day' => 1,
                    'overdue_days' => 4,
                ]
            ],
            [
                'email' => 'joko.tani@gmail.com',
                'name' => 'Joko Santoso',
                'business' => 'Agriternak Nusantara & Pertanian',
                'order_num' => 'WEB-261101-AGRI',
                'pkg_slug' => 'pixel',
                'site_slug' => 'tenant_agriculture_01',
                'tmpl_slug' => 'agriculture-agribisnis-forest-moss',
                'cat' => 'agriculture',
                'phone' => '081234560104',
                'city' => 'Malang',
                'used_quota' => 25, // 5.0% -> FRESH
                'hosting' => null, // NON-HOSTING (EMPTY STATE)
            ],

            // === TIER PULSE (1.500) ===
            [
                'email' => 'hendra.medika@gmail.com',
                'name' => 'dr. Hendra Wijaya',
                'business' => 'Klinik Pratama Sehat Bersama',
                'order_num' => 'WEB-261102-HEAL',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_healthcare_01',
                'tmpl_slug' => 'medika-care',
                'cat' => 'healthcare',
                'phone' => '081234560201',
                'city' => 'Surabaya',
                'used_quota' => 1500, // 100.0% -> HABIS / BLOCKED
                'hosting' => [
                    'type' => 'unpaid',
                    'domain' => 'kliniksehat.id',
                    'website' => 'Klinik Pratama Sehat Bersama',
                    'price' => 150000,
                    'cycle_day' => 18,
                    'due_days' => 8,
                ]
            ],
            [
                'email' => 'siti.resto@gmail.com',
                'name' => 'Siti Rahmawati',
                'business' => 'Resto Selera Nusantara',
                'order_num' => 'WEB-261102-FNB',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_fnb_01',
                'tmpl_slug' => 'laut-biru-seafood',
                'cat' => 'fnb',
                'phone' => '081234560202',
                'city' => 'Yogyakarta',
                'used_quota' => 1380, // 92.0% -> WARNING
                'hosting' => [
                    'type' => 'paid',
                    'domain' => 'seleranusantara.com',
                    'website' => 'Resto Selera Nusantara',
                    'price' => 150000,
                    'cycle_day' => 3,
                    'paid_days_ago' => 6,
                ]
            ],
            [
                'email' => 'dimas.kreatif@gmail.com',
                'name' => 'Dimas Prasetya',
                'business' => 'Dimas Visuals Personal Portfolio',
                'order_num' => 'WEB-261102-PERS',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_personal_brand_01',
                'tmpl_slug' => 'the-creator-room',
                'cat' => 'personal-brand',
                'phone' => '081234560203',
                'city' => 'Jakarta Barat',
                'used_quota' => 350, // 23.3% -> NORMAL
                'hosting' => [
                    'type' => 'multi_invoice',
                    'domain' => 'dimasvisuals.com',
                    'website' => 'Dimas Visuals Personal Brand',
                    'price' => 150000,
                    'cycle_day' => 10,
                ]
            ],
            [
                'email' => 'drh.sarah@gmail.com',
                'name' => 'drh. Sarah Wijaya',
                'business' => 'Pawtopia Animal Care Center',
                'order_num' => 'WEB-261102-PET',
                'pkg_slug' => 'pulse',
                'site_slug' => 'tenant_pet_01',
                'tmpl_slug' => 'petshop-minimalist-glacierblue',
                'cat' => 'pet-animal-service',
                'phone' => '081234560204',
                'city' => 'Bogor',
                'used_quota' => 85, // 5.7% -> FRESH
                'hosting' => [
                    'type' => 'active_no_invoice',
                    'domain' => 'pawtopia.id',
                    'website' => 'Pawtopia Animal Care',
                    'price' => 150000,
                    'cycle_day' => 28,
                ]
            ],

            // === TIER NEXUS (2.500) ===
            [
                'email' => 'fajar.tour@gmail.com',
                'name' => 'Fajar Pratama',
                'business' => 'OceanJourney Travel & Tour',
                'order_num' => 'WEB-261103-TRAV',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_travel_01',
                'tmpl_slug' => 'northstar-studio',
                'cat' => 'travel-tourism',
                'phone' => '081234560301',
                'city' => 'Denpasar Bali',
                'used_quota' => 2380, // 95.2% -> WARNING
                'hosting' => [
                    'type' => 'overdue',
                    'domain' => 'oceanjourney.id',
                    'website' => 'OceanJourney Travel',
                    'price' => 175000,
                    'cycle_day' => 2,
                    'overdue_days' => 5,
                ]
            ],
            [
                'email' => 'budi.logistik@gmail.com',
                'name' => 'Budi Hartono',
                'business' => 'Swiftly Express Logistics',
                'order_num' => 'WEB-261103-LOG',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_logistics_01',
                'tmpl_slug' => 'urban-supply',
                'cat' => 'logistics',
                'phone' => '081234560302',
                'city' => 'Jakarta Utara',
                'used_quota' => 2500, // 100.0% -> HABIS / BLOCKED
                'hosting' => [
                    'type' => 'cancelled_replaced',
                    'domain' => 'swiftlyexpress.com',
                    'website' => 'Swiftly Express Logistics',
                    'price_old' => 250000,
                    'price_new' => 180000,
                    'cycle_day' => 20,
                ]
            ],
            [
                'email' => 'denny.mebel@gmail.com',
                'name' => 'Denny Saputra',
                'business' => 'WoodenLane Modern Furniture',
                'order_num' => 'WEB-261103-FURN',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_furniture_01',
                'tmpl_slug' => 'interior-design-studio-artistic-terracotta',
                'cat' => 'furniture',
                'phone' => '081234560303',
                'city' => 'Jepara',
                'used_quota' => 1150, // 46.0% -> NORMAL
                'hosting' => [
                    'type' => 'paid',
                    'domain' => 'woodenlane.co.id',
                    'website' => 'WoodenLane Furniture',
                    'price' => 180000,
                    'cycle_day' => 7,
                    'paid_days_ago' => 3,
                ]
            ],
            [
                'email' => 'h.ahmad@gmail.com',
                'name' => 'H. Ahmad Fauzi',
                'business' => 'Baitul Safar Travel Umrah & Haji',
                'order_num' => 'WEB-261103-UMRH',
                'pkg_slug' => 'nexus',
                'site_slug' => 'tenant_umrah_01',
                'tmpl_slug' => 'travel-umrah-haji-emerald-green',
                'cat' => 'travel-tourism',
                'phone' => '081234560304',
                'city' => 'Surabaya',
                'used_quota' => 160, // 6.4% -> FRESH
                'hosting' => [
                    'type' => 'unpaid',
                    'domain' => 'baitulsafar.com',
                    'website' => 'Baitul Safar Travel Umrah',
                    'price' => 175000,
                    'cycle_day' => 16,
                    'due_days' => 6,
                ]
            ],

            // === TIER INFINITY (5.000) ===
            [
                'email' => 'cahyo.bimbel@gmail.com',
                'name' => 'Cahyo Wibowo',
                'business' => 'Ruby Academy Cendekia Juara',
                'order_num' => 'WEB-261104-EDUC',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_education_01',
                'tmpl_slug' => 'brightpath-academy',
                'cat' => 'education',
                'phone' => '081234560401',
                'city' => 'Bandung',
                'used_quota' => 5000, // 100.0% -> HABIS / BLOCKED
                'hosting' => [
                    'type' => 'multi_invoice',
                    'domain' => 'rubyacademy.id',
                    'website' => 'Ruby Academy Cendekia',
                    'price' => 250000,
                    'cycle_day' => 8,
                ]
            ],
            [
                'email' => 'rahmat.konsultan@gmail.com',
                'name' => 'Rahmat Hidayat',
                'business' => 'Konsultan Pajak & Bisnis Mitra',
                'order_num' => 'WEB-261104-PROF',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_professional_service_01',
                'tmpl_slug' => 'nexa-consulting',
                'cat' => 'services',
                'phone' => '081234560402',
                'city' => 'Jakarta Pusat',
                'used_quota' => 4450, // 89.0% -> WARNING
                'hosting' => [
                    'type' => 'paid',
                    'domain' => 'mitrapajak.com',
                    'website' => 'Konsultan Pajak Mitra',
                    'price' => 250000,
                    'cycle_day' => 4,
                    'paid_days_ago' => 5,
                ]
            ],
            [
                'email' => 'kevin.fitness@gmail.com',
                'name' => 'Kevin Pratama',
                'business' => 'IRONPULSE Mega Athletic Gym',
                'order_num' => 'WEB-261104-FITN',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_fitness_01',
                'tmpl_slug' => 'sports-gym-bold',
                'cat' => 'fitness',
                'phone' => '081234560403',
                'city' => 'Surabaya',
                'used_quota' => 2100, // 42.0% -> NORMAL
                'hosting' => [
                    'type' => 'unpaid',
                    'domain' => 'ironpulse.id',
                    'website' => 'IRONPULSE Mega Gym',
                    'price' => 250000,
                    'cycle_day' => 14,
                    'due_days' => 4,
                ]
            ],
            [
                'email' => 'iwan.properti@gmail.com',
                'name' => 'Iwan Setiawan',
                'business' => 'Griya Indah Realty & Residence',
                'order_num' => 'WEB-261104-PROP',
                'pkg_slug' => 'infinity',
                'site_slug' => 'tenant_property_01',
                'tmpl_slug' => 'property-emerald-green',
                'cat' => 'property',
                'phone' => '081234560404',
                'city' => 'Surabaya',
                'used_quota' => 220, // 4.4% -> FRESH
                'hosting' => null, // NON-HOSTING (EMPTY STATE)
            ],
        ];

        $invoiceSerial = 1;

        foreach ($matrixClients as $c) {
            $user = User::create([
                'name' => $c['name'],
                'email' => $c['email'],
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'email_verified_at' => $now,
            ]);

            $pkg = $packages->get($c['pkg_slug']);
            $tmpl = WebiaTemplate::where('slug', $c['tmpl_slug'])->first();
            $limit = $pkg?->chatbot_monthly_quota ?? 500;

            WebiaOrder::create([
                'order_number' => $c['order_num'],
                'user_id' => $user->id,
                'guest_name' => $user->name,
                'guest_email' => $user->email,
                'webia_package_id' => $pkg?->id ?? 1,
                'package_snapshot' => [
                    'name' => $pkg?->name ?? ucfirst($c['pkg_slug']),
                    'slug' => $c['pkg_slug'],
                    'price' => $pkg?->price ?? 499000,
                    'chatbot_monthly_quota' => $limit,
                ],
                'webia_template_id' => $tmpl?->id,
                'template_snapshot' => [
                    'name' => $tmpl?->name ?? $c['business'],
                    'slug' => $c['tmpl_slug'],
                    'tag' => ucfirst($c['cat']),
                ],
                'category_slug' => $c['cat'],
                'status' => 'paid',
                'credential_status' => 'issued',
                'total_price' => $pkg?->price ?? 499000,
                'paid_at' => $now->copy()->subDays(15),
                'business_data' => [
                    'business_name' => $c['business'],
                    'owner_name' => $c['name'],
                    'whatsapp' => $c['phone'],
                    'city' => $c['city'],
                ],
                'delivery_status' => 'delivered',
                'site_slug' => $c['site_slug'],
            ]);

            // Inisialisasi berkas markdown knowledge base & SQLite
            AiQuotaService::ensureTenantInitialized(
                $c['site_slug'],
                $c['business'],
                $c['cat'],
                $c['pkg_slug'],
                $limit
            );

            // Tanam pemakaian kuota pesan di SQLite app.db
            if ($pdo) {
                $stmtT = $pdo->prepare("INSERT OR REPLACE INTO tenants (id, name, category, is_active, created_at, package_tier, monthly_message_quota) VALUES (?, ?, ?, 1, datetime('now'), ?, ?)");
                $stmtT->execute([$c['site_slug'], $c['business'], $c['cat'], $c['pkg_slug'], $limit]);

                $insertCount = $c['used_quota'];
                if ($insertCount > 0) {
                    $pdo->beginTransaction();
                    $stmtU = $pdo->prepare("INSERT INTO usages (session_id, layer, tenant_id, prompt_tokens, completion_tokens, total_tokens, latency_ms, provider, model, is_fallback, created_at) VALUES (?, 'L4', ?, 45, 60, 105, 120, 'google', 'gemini-1.5-flash', 0, ?)");
                    for ($k = 0; $k < $insertCount; $k++) {
                        $sessId = 'sess_' . substr(md5($c['site_slug'] . $k), 0, 12);
                        $daysSub = $k % 10;
                        $timestamp = $now->copy()->subDays($daysSub)->toDateTimeString();
                        $stmtU->execute([$sessId, $c['site_slug'], $timestamp]);
                    }
                    $pdo->commit();
                }
            }

            // Setup Layanan & Tagihan Hosting
            if ($c['hosting']) {
                $hCfg = $c['hosting'];
                $hType = $hCfg['type'];

                $hs = HostingService::create([
                    'user_id' => $user->id,
                    'website_name' => $hCfg['website'],
                    'domain' => $hCfg['domain'],
                    'monthly_price' => $hCfg['price'] ?? ($hCfg['price_new'] ?? 150000),
                    'activation_date' => $now->copy()->subMonths(1)->toDateString(),
                    'billing_cycle_day' => $hCfg['cycle_day'] ?? 10,
                    'billing_status' => 'active',
                    'operational_status' => 'active',
                ]);

                $invNum = 'HST-' . $now->format('Ym') . '-' . str_pad((string)$invoiceSerial++, 6, '0', STR_PAD_LEFT);

                if ($hType === 'unpaid') {
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym'),
                        'label' => 'Tagihan Hosting Siklus ' . $now->translatedFormat('F Y'),
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(2),
                        'due_at' => $now->copy()->addDays($hCfg['due_days'] ?? 5),
                        'amount' => $hCfg['price'],
                        'status' => 'unpaid',
                        'paid_at' => null,
                    ]);
                } elseif ($hType === 'paid') {
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym'),
                        'label' => 'Tagihan Hosting Siklus ' . $now->translatedFormat('F Y'),
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(6),
                        'due_at' => $now->copy()->addDays(2),
                        'amount' => $hCfg['price'],
                        'status' => 'paid',
                        'paid_at' => $now->copy()->subDays($hCfg['paid_days_ago'] ?? 3),
                    ]);
                } elseif ($hType === 'overdue') {
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym'),
                        'label' => 'Tagihan Hosting Siklus ' . $now->translatedFormat('F Y') . ' (Menunggak)',
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(12),
                        'due_at' => $now->copy()->subDays($hCfg['overdue_days'] ?? 4),
                        'amount' => $hCfg['price'],
                        'status' => 'overdue',
                        'paid_at' => null,
                    ]);
                } elseif ($hType === 'multi_invoice') {
                    // Invoice 1: Bulan Lalu (Paid)
                    $invNumPrev = 'HST-' . $now->copy()->subMonth()->format('Ym') . '-' . str_pad((string)$invoiceSerial++, 6, '0', STR_PAD_LEFT);
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNumPrev,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->copy()->subMonth()->format('Ym'),
                        'label' => 'Tagihan Hosting Siklus ' . $now->copy()->subMonth()->translatedFormat('F Y'),
                        'period_start' => $now->copy()->subMonth()->startOfMonth()->toDateString(),
                        'period_end' => $now->copy()->subMonth()->endOfMonth()->toDateString(),
                        'issued_at' => $now->copy()->subDays(40),
                        'due_at' => $now->copy()->subDays(30),
                        'amount' => $hCfg['price'],
                        'status' => 'paid',
                        'paid_at' => $now->copy()->subDays(33),
                    ]);
                    // Invoice 2: Bulan Berjalan (Unpaid)
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym'),
                        'label' => 'Tagihan Hosting Siklus ' . $now->translatedFormat('F Y'),
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(1),
                        'due_at' => $now->copy()->addDays(6),
                        'amount' => $hCfg['price'],
                        'status' => 'unpaid',
                        'paid_at' => null,
                    ]);
                } elseif ($hType === 'cancelled_replaced') {
                    $invCancelled = HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum . '-CAN',
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym') . '-OLD',
                        'label' => 'Tagihan Hosting (Dibatalkan Admin)',
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(6),
                        'due_at' => $now->copy()->addDays(1),
                        'amount' => $hCfg['price_old'],
                        'status' => 'cancelled',
                        'cancelled_at' => $now->copy()->subDays(2),
                        'cancellation_reason' => 'Penyesuaian diskon promo tahun pertama website',
                    ]);
                    HostingInvoice::create([
                        'hosting_service_id' => $hs->id,
                        'invoice_number' => $invNum,
                        'billing_key' => 'HST-KEY-' . $hs->id . '-' . $now->format('Ym') . '-NEW',
                        'label' => 'Tagihan Hosting Pengganti Siklus ' . $now->translatedFormat('F Y'),
                        'period_start' => $startOfMonth->toDateString(),
                        'period_end' => $endOfMonth->toDateString(),
                        'issued_at' => $now->copy()->subDays(2),
                        'due_at' => $now->copy()->addDays(5),
                        'amount' => $hCfg['price_new'],
                        'status' => 'unpaid',
                        'replacement_for_id' => $invCancelled->id,
                    ]);
                }
            }
        }
    }
}
