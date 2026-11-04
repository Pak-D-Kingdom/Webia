<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/sports-fitness/gym-fitness-center/ironpulse/ironpulse.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>IRONPULSE Gym & Fitness Center</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=DM+Sans:wght@400;500;700&display=swap">

</head>

<body>
    <div class="top">🎉 PROMO NOVEMBER: DAFTAR HARI INI, GRATIS 7 HARI TRIAL + BEBAS BIAYA PENDAFTARAN</div>
    <nav>
        <div class="in"><a href="#top" class="logo">IRON<b>PULSE</b></a><button class="burger" id="bg"
                aria-label="Menu">MENU</button>
            <div class="links" id="lk"><a href="#zona">Zona</a><a href="#program">Program</a><a
                    href="#member">Membership</a><a href="#trainer">Trainer</a><a href="#kelas">Kelas</a><a
                    href="#faq">FAQ</a><a class="btn" href="#daftar" style="padding:9px 18px">Gabung</a><button
                    class="tgl" id="tg" aria-label="Ganti tema terang atau gelap">◐</button></div>
        </div>
    </nav>

    <header class="hero" id="top">
        <div class="plate p1"></div>
        <div class="plate p2"></div>
        <div class="dbw"><i class="pl"></i><i class="pl s"></i><b></b><i class="pl s"></i><i
                class="pl"></i></div><svg class="ecg" viewBox="0 0 1200 80" preserveAspectRatio="none">
            <path pathLength="1000" vector-effect="non-scaling-stroke"
                d="M0 40H300l20-6 20 6h40l20-34 24 68 20-34h40H700l20-6 20 6h40l20-34 24 68 20-34h40H1200" />
        </svg>
        <div class="hi">
            <p class="tag">Gym &amp; Fitness Center • Surabaya</p>
            <h1>Bangun<br><span>Tubuh</span><br><em>Barumu.</em></h1>
            <p>Latihan keras, hasil nyata. Alat lengkap, trainer bersertifikat, dan komunitas yang mendorongmu melewati
                batas.</p>
            <a class="btn" href="#daftar">Mulai Membership</a> <a class="btn o" href="#zona">Lihat Gym</a>
            <div class="stats">
                <div><b data-n="2500" data-s="+">0</b><small>Member aktif</small></div>
                <div><b data-n="24">0</b><small>Trainer</small></div>
                <div><b data-n="5">0</b><small>Zona latihan</small></div>
            </div>
        </div>
    </header>
    <div class="mq">
        <div id="mqi"></div>
    </div>

    <section id="manifesto">
        <p class="tag">Manifesto</p>
        <p class="mani">Kami percaya <span>disiplin</span> mengalahkan motivasi. Di sini tidak ada jalan pintas, hanya
            <span>repetisi</span>, kerja keras, dan komunitas yang saling menjaga. Semua level diterima. Ego ditinggal
            di pintu.
        </p>
    </section>

    <div class="alt">
        <section class="in" id="zona">
            <p class="tag">Gym Zone Explorer</p>
            <h2>Pilih Zonamu</h2>
            <p class="sub">Klik zona untuk melihat isi dan peralatannya.</p>
            <div id="zt"></div>
            <div class="zone" style="margin-top:14px">
                <div class="zv" id="zv"></div>
                <div class="card" id="zi"></div>
            </div>
        </section>
    </div>

    <section id="program">
        <p class="tag">Signature Training Programs</p>
        <h2>Program Latihan</h2>
        <p class="sub">Lima program inti yang disusun bertahap dan terukur.</p>
        <div class="grid" id="pg"></div>
    </section>

    <div class="alt">
        <section class="in" id="member">
            <p class="tag">Membership</p>
            <h2>Pilih Paketmu</h2>
            <p class="sub">Harga transparan. Tanpa biaya tersembunyi. (Harga contoh/demo.)</p>
            <div class="grid" id="tr"></div>
        </section>
    </div>

    <section id="goal">
        <p class="tag">Personal Fitness Goal</p>
        <h2>Apa Targetmu?</h2>
        <p class="sub">Pilih tujuan, kami tampilkan program yang cocok.</p>
        <div id="gb"></div>
        <div class="card" id="gr" style="margin-top:14px"></div>
    </section>

    <div class="alt">
        <section class="in" id="trainer">
            <p class="tag">Trainer Performance Profiles</p>
            <h2>Pelatih Kami</h2>
            <p class="sub">Semua trainer bersertifikat dan berpengalaman.</p>
            <div class="grid" id="tn"></div>
        </section>
    </div>

    <section id="kelas">
        <p class="tag">Weekly Training Battleboard</p>
        <h2>Jadwal Mingguan</h2>
        <div id="dt"></div>
        <div id="ds"></div>
    </section>

    <div class="alt">
        <section class="in" id="pulse">
            <p class="tag">Gym Crowd &amp; Activity Pulse</p>
            <h2>Seberapa Ramai?</h2>
            <p class="sub">Data demo untuk ilustrasi, bukan data langsung. Hijau = jam sekarang.</p>
            <div class="bars" id="bars"></div>
            <p id="pl" style="margin-top:14px;font-weight:800"></p>
        </section>
    </div>

    <section id="progress">
        <p class="tag">Personal Progress Preview</p>
        <h2>Lacak Kemajuanmu</h2>
        <p class="sub">Contoh dashboard progres member (demo).</p>
        <div class="grid">
            <div class="card">
                <div id="pr"></div>
            </div>
            <div class="card">
                <h3>Rekor Personal</h3>
                <div class="row"><span>Deadlift</span><b>140 kg</b></div>
                <div class="row"><span>Bench Press</span><b>85 kg</b></div>
                <div class="row"><span>Squat</span><b>115 kg</b></div>
                <div class="row"><span>Lari 5K</span><b>24:30</b></div>
            </div>
        </div>
    </section>

    <div class="alt">
        <section class="in" id="story">
            <p class="tag">Transformation Stories</p>
            <h2>Cerita Member</h2>
            <p class="sub">Dipublikasikan dengan persetujuan member. Konten demo.</p>
            <div class="grid" id="st"></div>
        </section>
    </div>

    <section id="fasilitas">
        <p class="tag">Equipment &amp; Facilities</p>
        <h2>Fasilitas</h2>
        <div class="grid" id="fc"></div>
    </section>

    <div class="alt">
        <section class="in" id="tur">
            <p class="tag">Gym Tour Gallery</p>
            <h2>Keliling Gym</h2>
            <p class="sub">Geser ke samping untuk tur panorama.</p>
            <div class="gal" id="gl"></div>
        </section>
    </div>

    <section id="panduan">
        <p class="tag">First-Time Guide</p>
        <h2>Pertama Kali ke Gym?</h2>
        <div class="grid steps">
            <div class="card step">
                <h3>Daftar</h3>
                <p>Isi formulir online atau datang langsung.</p>
            </div>
            <div class="card step">
                <h3>Orientasi</h3>
                <p>Tur fasilitas dan pengenalan alat gratis.</p>
            </div>
            <div class="card step">
                <h3>Sesi Trial</h3>
                <p>Latihan bersama trainer selama 7 hari.</p>
            </div>
            <div class="card step">
                <h3>Gabung</h3>
                <p>Pilih paket dan mulai programmu.</p>
            </div>
        </div>
    </section>

    <div class="alt">
        <section class="in" id="daftar">
            <p class="tag">Join Now</p>
            <h2>Booking &amp; Registrasi</h2>
            <div><button class="pill on" data-f="trial">Booking Free Trial</button><button class="pill"
                    data-f="reg">Registrasi Membership</button></div>
            <form id="fm" style="margin-top:14px"><input name="n" placeholder="Nama lengkap"
                    required><input name="w" type="tel" placeholder="No. WhatsApp" required><input
                    name="e" type="email" placeholder="Email" id="em" style="display:none"><select
                    id="pk" style="display:none">
                    <option>Basic</option>
                    <option>Pro</option>
                    <option>Elite</option>
                </select><input name="d" type="date" id="dd"><button class="btn"
                    id="sb">Booking Trial Gratis</button>
                <div class="ok" id="ok"></div>
            </form>
        </section>
    </div>

    <section id="lokasi">
        <p class="tag">Location</p>
        <h2>Lokasi &amp; Jam Buka</h2>
        <div class="grid">
            <div class="card">
                <h3>Alamat</h3>
                <p>Jl. Contoh Raya No. 88, Surabaya, Jawa Timur (alamat demo)</p>
            </div>
            <div class="card">
                <h3>Jam Operasional</h3>
                <p>Senin–Jumat: 05.00–23.00<br>Sabtu–Minggu: 06.00–21.00</p>
            </div>
            <div class="card">
                <h3>Jam Ramai</h3>
                <p>Puncak: 17.00–20.00<br>Paling sepi: 09.00–14.00</p>
            </div>
        </div>
    </section>

    <div class="alt">
        <section class="in" id="komunitas">
            <p class="tag">Community Wall</p>
            <h2>Suara Komunitas</h2>
            <div class="grid" id="cm"></div>
        </section>
    </div>

    <section id="event">
        <p class="tag">Events &amp; Competitions</p>
        <h2>Kalender Event</h2>
        <div id="ev"></div>
    </section>

    <div class="alt">
        <section class="in" id="faq">
            <p class="tag">FAQ</p>
            <h2>Pertanyaan Umum</h2>
            <div id="fq"></div>
        </section>
    </div>

    <footer>
        <div class="logo" style="margin-bottom:10px">IRON<b>PULSE</b></div>Jl. Contoh Raya No. 88, Surabaya •
        hello@ironpulse.id • @ironpulse.gym<br>© 2026 IRONPULSE. Semua hak dilindungi.
    </footer>

    <div class="chat" id="ch">
        <h4>Pulse AI Coach</h4>
        <div class="msgs" id="ms">
            <p>Halo! Aku Pulse AI. Tanya soal paket, jadwal, atau program.</p>
        </div>
        <div class="q"><button class="pill" data-q="0">Harga paket</button><button class="pill"
                data-q="1">Jam buka</button><button class="pill" data-q="2">Program pemula</button></div>
    </div>
    <div class="fab"><a class="fb wa"
            href="https://wa.me/{{ config('webia.ironpulse_whatsapp', '6281234567890') }}" target="_blank"
            rel="noopener" aria-label="WhatsApp">💬</a><button class="fb ai" id="ab"
            aria-label="AI Chatbot"><span>💪</span></button></div>


    <script>
        window.IRONPULSE_WA_ADMIN = window.IRONPULSE_WA_ADMIN || '6281234567890';
    </script>
    <script src="{{ asset('js/website-bisnis/templates/sports-fitness/gym-fitness-center/ironpulse/ironpulse.js') }}" defer>
    </script>
</body>

</html>
