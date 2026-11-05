@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Roseline Service Center – Servis Kendaraan Transparan</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--rg:#B76E79;--rg2:#E3A99F;--rgd:#8C4A55;--ch:#1F2430;--bl:#FBF1EE;--mu:#6D7280;--ln:#EADBD8;--ok:#2E9E6B;--wn:#E0A021;--er:#D64545;--met:linear-gradient(135deg,#EBC0B4,#B76E79 45%,#E3A99F 70%,#9C5560);
--f:'Plus Jakarta Sans',system-ui,sans-serif;--m:'DM Mono',ui-monospace,monospace;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{margin:0;background:#fff;color:var(--ch);font:400 16px/1.65 var(--f);overflow-x:hidden;padding-bottom:calc(64px + env(safe-area-inset-bottom,0px))}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.wrap{max-width:1200px;margin:auto;padding:0 24px}
.ut{background:var(--ch);color:#D5D7DE;font-size:13px}
.ut .wrap{display:flex;justify-content:space-between;gap:16px;padding-top:8px;padding-bottom:8px;flex-wrap:wrap}
.ut b{color:var(--rg2);font-weight:600}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;background:#fff;border-bottom:1px solid var(--ln)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;padding-top:14px;padding-bottom:14px}
#roseline-menu-button{display:none;background:#fff;border:1.5px solid var(--ln);border-radius:10px;width:46px;height:46px;color:var(--ch);font-size:22px;cursor:pointer}
#roseline-menu{position:fixed;left:0;right:0;top:calc(74px + env(safe-area-inset-top,0px));bottom:0;z-index:45;background:#fff;border-bottom:1px solid var(--ln);padding:24px;overflow-y:auto;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}
#roseline-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}
#roseline-menu a{display:block;padding:16px 0;border-bottom:1px solid var(--ln);font:700 18px var(--f)}
.lg{font:800 21px var(--f);letter-spacing:-.03em;display:flex;align-items:center;gap:10px}
.lg i{width:28px;height:28px;border-radius:8px;background:var(--met)}
.lg small{font:500 11px var(--f);color:var(--mu);letter-spacing:.1em;text-transform:uppercase;margin-left:2px}
nav ul{display:flex;gap:30px;list-style:none;margin:0;padding:0;font-size:14.5px;font-weight:500;color:var(--mu)}
nav ul a:hover{color:var(--rgd)}
@media(max-width:860px){nav ul,.lg small,nav .wrap>.btn{display:none}nav .wrap{grid-template-columns:1fr auto}#roseline-menu-button{display:block}}
.btn{display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:10px;border:0;background:var(--ch);color:#fff;font:600 14.5px var(--f);cursor:pointer;transition:.25s}
.btn:hover,.btn:focus-visible{background:var(--rgd);outline:none}
.btn.m{background:var(--met);color:#fff;text-shadow:0 1px 0 rgba(0,0,0,.15)}.btn.m:hover{filter:brightness(1.08)}
.btn.o{background:#fff;color:var(--ch);box-shadow:inset 0 0 0 1.5px var(--ch)}.btn.o:hover{background:var(--ch);color:#fff}
.ey{font:600 12.5px var(--f);letter-spacing:.14em;text-transform:uppercase;color:var(--rg)}
/* hero */
.hero{background:linear-gradient(180deg,var(--bl),#fff);padding:84px 0 70px}
.hero h1{font:800 clamp(38px,5.6vw,80px)/1.02 var(--f);letter-spacing:-.045em;max-width:900px;margin:16px 0 20px}
.hero h1 span{background:var(--met);-webkit-background-clip:text;background-clip:text;color:transparent}
.hero p{max-width:560px;color:var(--mu);font-size:18px}
.hc{display:flex;gap:12px;flex-wrap:wrap;margin:30px 0 46px}
.tr{display:flex;gap:44px;flex-wrap:wrap;padding-top:26px;border-top:1px solid var(--ln)}
.tr b{display:block;font:700 30px var(--f);letter-spacing:-.03em}.tr span{font-size:13.5px;color:var(--mu)}
.fl{display:grid;grid-template-columns:repeat(5,1fr);margin-top:60px;position:relative}
.fl::before{content:"";position:absolute;left:10%;right:10%;top:23px;height:3px;background:var(--ln)}
.fl::after{content:"";position:absolute;left:10%;top:23px;height:3px;background:var(--met);width:var(--w,0);transition:width .8s}
.fs{text-align:center;padding:0 8px;position:relative;z-index:1}
.fs i{width:48px;height:48px;border-radius:50%;background:#fff;border:3px solid var(--ln);display:grid;place-items:center;margin:0 auto 12px;font:600 15px var(--m);font-style:normal;color:var(--mu);transition:.5s}
.fs.on i{background:var(--met);border-color:transparent;color:#fff;transform:scale(1.12);box-shadow:0 8px 22px -6px rgba(183,110,121,.7)}
.fs.dn i{border-color:var(--rg);color:var(--rg)}
.fs b{display:block;font-size:15px}.fs span{font-size:13px;color:var(--mu);display:block;max-width:170px;margin:2px auto 0;line-height:1.4}
@media(max-width:760px){.fl{grid-template-columns:1fr;gap:18px}.fl::before,.fl::after{display:none}.fs{display:flex;gap:14px;text-align:left;align-items:center}.fs i{margin:0;flex:none}}
section{padding:96px 0}
.hd{max-width:680px;margin-bottom:44px}
.hd h2{font:800 clamp(30px,4vw,52px)/1.05 var(--f);letter-spacing:-.04em;margin:10px 0 12px}
.hd p{color:var(--mu)}
/* board */
.bs{background:var(--ch);color:#fff}
.bs .hd p{color:#A9ADBA}.bs .hd h2{color:#fff}
.bb{background:#161A23;border:1px solid #2D3342;border-radius:18px;overflow:hidden;font-family:var(--m)}
.bh{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;padding:16px 22px;background:#11141B;border-bottom:1px solid #2D3342;font-size:13px;color:#A9ADBA}
.bh b{color:var(--rg2);font-weight:500}
.br{display:grid;grid-template-columns:70px 1.4fr 1.3fr 1.1fr 90px;gap:12px;padding:15px 22px;border-bottom:1px solid #232938;font-size:14px;align-items:center;transition:background .6s}
.br.hd2{font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:#6F7585;padding-top:12px;padding-bottom:12px}
.br.fl2{background:rgba(227,169,159,.16)}
.br small{display:block;color:#7E8494;font-size:12px}
.sb{display:inline-flex;align-items:center;gap:8px;font-size:13px}.sb::before{content:"";width:9px;height:9px;border-radius:50%;background:var(--c)}
.sb.p::before{animation:bl 1.2s infinite}@keyframes bl{50%{opacity:.25}}
@media(max-width:760px){.br{grid-template-columns:50px 1fr 1fr;font-size:12.5px}.br>:nth-child(3),.br>:nth-child(5){display:none}.br.hd2>:nth-child(3),.br.hd2>:nth-child(5){display:none}}
.nt{font-size:13px;color:#8A8F9E;margin-top:14px}
/* inspeksi */
.in{display:grid;grid-template-columns:280px 1fr;gap:40px;align-items:start}
.dn{background:var(--bl);border-radius:20px;padding:28px;text-align:center;position:sticky;top:100px}
.dn svg{width:180px;transform:rotate(-90deg)}
.dn circle{fill:none;stroke-width:16;transition:stroke-dasharray .8s}
.dn .c{position:relative;margin:auto;width:180px}.dn .c b{position:absolute;inset:0;display:grid;place-content:center;font:800 38px var(--f);letter-spacing:-.04em}.dn .c b small{font:500 12px var(--f);color:var(--mu);letter-spacing:0}
.lgd{display:grid;gap:8px;margin-top:20px;text-align:left;font-size:14px}.lgd span{display:flex;align-items:center;gap:10px}.lgd i{width:12px;height:12px;border-radius:50%}
.fb{display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap}
.fb button{padding:8px 18px;border-radius:99px;border:1.5px solid var(--ln);background:#fff;font:600 13.5px var(--f);cursor:pointer;color:var(--mu)}
.fb button[aria-pressed=true]{background:var(--ch);color:#fff;border-color:var(--ch)}
.ir{display:grid;grid-template-columns:34px 1fr auto;gap:4px 16px;padding:16px 4px;border-bottom:1px solid var(--ln);align-items:center}
.ir>i{width:12px;height:12px;border-radius:50%;background:var(--c);justify-self:center;box-shadow:0 0 0 5px color-mix(in srgb,var(--c) 18%,transparent)}
.ir b{font-weight:600}.ir small{grid-column:2;color:var(--mu);font-size:13.5px;margin-top:-4px}
.ir button{grid-row:1/3;grid-column:3;padding:8px 14px;border-radius:8px;border:1.5px solid var(--rg);background:#fff;color:var(--rgd);font:600 13px var(--f);cursor:pointer}
.ir button:hover,.ir button.on{background:var(--rg);color:#fff}
@media(max-width:860px){.in{grid-template-columns:1fr}.dn{position:static}}
/* quote */
.qt{background:var(--bl)}
.qg{display:grid;grid-template-columns:.9fr 1.1fr;gap:40px;align-items:start}
.qp{background:#fff;border-radius:20px;padding:30px;border:1px solid var(--ln)}
.qp label.l{display:block;font:600 12px var(--f);letter-spacing:.1em;text-transform:uppercase;color:var(--mu);margin:16px 0 6px}
.qp input[type=text],.qp input[type=date],.qp select{width:100%;padding:12px 14px;border:1.5px solid var(--ln);border-radius:10px;font:400 15px var(--f);background:#fff;color:var(--ch);outline:none}
.qp input:focus,.qp select:focus{border-color:var(--rg)}
.sv{display:flex;justify-content:space-between;gap:12px;align-items:center;padding:11px 0;border-bottom:1px solid var(--ln);font-size:15px;cursor:pointer}
.sv input{accent-color:var(--rg);width:18px;height:18px;margin-right:12px}.sv span:first-child{display:flex;align-items:center}.sv em{font:400 13px var(--m);font-style:normal;color:var(--mu)}
.dc{background:#fff;border-radius:6px;padding:36px;border-top:6px solid transparent;border-image:var(--met) 1;box-shadow:0 30px 60px -30px rgba(140,74,85,.4);position:sticky;top:100px}
.dc h3{font:800 22px var(--f);letter-spacing:.06em;text-transform:uppercase}
.dm{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;font:400 12.5px var(--m);color:var(--mu);margin:8px 0 18px;padding-bottom:16px;border-bottom:1px solid var(--ln)}
.dk{display:grid;grid-template-columns:auto 1fr;gap:4px 14px;font-size:14px;margin-bottom:18px}.dk span{color:var(--mu)}
.dl{display:flex;justify-content:space-between;gap:12px;padding:9px 0;border-bottom:1px dashed var(--ln);font-size:14.5px}.dl span:last-child{font-family:var(--m);font-size:13.5px;white-space:nowrap}
.dl.e{color:var(--mu)}
.tt{display:flex;justify-content:space-between;padding:7px 0;font-size:14.5px}.tt.g{font:800 24px var(--f);border-top:2px solid var(--ch);margin-top:8px;padding-top:14px}.tt.g span:last-child{color:var(--rgd)}
.dc .ft{font-size:12px;color:var(--mu);margin:14px 0 18px;line-height:1.5}
@media(max-width:900px){.qg{grid-template-columns:1fr}.dc{position:static}}
/* armada */
.ar{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.ac{border:1px solid var(--ln);border-radius:18px;padding:30px;transition:.3s}
.ac:hover{border-color:var(--rg);box-shadow:0 20px 40px -24px rgba(183,110,121,.6);transform:translateY(-4px)}
.ac svg{width:40px;stroke:var(--rg);fill:none;stroke-width:1.6;margin-bottom:16px;stroke-linecap:round;stroke-linejoin:round}
.ac h3{font:700 20px var(--f);letter-spacing:-.02em;margin-bottom:6px}.ac p{color:var(--mu);font-size:15px}
@media(max-width:860px){.ar{grid-template-columns:1fr}}
footer{background:var(--ch);color:#B6BAC6;padding:60px 0 30px}
.fg{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:40px}footer h3{font:600 13px var(--f);letter-spacing:.12em;text-transform:uppercase;color:var(--rg2);margin-bottom:10px}footer p,footer li{font-size:14.5px}footer ul{list-style:none;padding:0;margin:0}
.cp{font-size:12.5px;margin-top:36px;padding-top:20px;border-top:1px solid #323847;max-width:820px;color:#8A8F9E}
@media(max-width:760px){.fg{grid-template-columns:1fr}}
/* chat bar */
#cb{position:fixed;left:0;right:0;bottom:0;z-index:80;background:var(--ch);color:#fff;display:flex;justify-content:center;align-items:center;gap:18px;padding:11px 16px calc(11px + env(safe-area-inset-bottom,0px));border-top:2px solid var(--rg);font-size:14.5px}
#cb span{color:#C9CCD6}@media(max-width:600px){#cb span{display:none}}
#cb button{padding:9px 20px}
#cp{position:fixed;left:50%;bottom:calc(58px + env(safe-area-inset-bottom,0px));z-index:79;width:min(560px,calc(100vw - 24px));height:min(460px,64vh);background:#fff;border:1px solid var(--ln);border-radius:18px 18px 0 0;box-shadow:0 -20px 60px rgba(31,36,48,.25);display:flex;flex-direction:column;transform:translate(-50%,115%);transition:transform .5s cubic-bezier(.5,0,.2,1);visibility:hidden}
#cp.open{transform:translate(-50%,0);visibility:visible}
#cp header{display:flex;justify-content:space-between;align-items:center;padding:14px 20px;border-bottom:1px solid var(--ln)}
#cp header b{font-weight:700}#cp header small{display:block;color:var(--ok);font-size:12px;font-weight:500}
#cp header button{background:none;border:0;font-size:24px;cursor:pointer;color:var(--mu)}
#ms{flex:1;overflow-y:auto;padding:16px 20px;display:flex;flex-direction:column;gap:10px;font-size:14.5px;background:var(--bl)}
.m{max-width:86%;padding:10px 14px;border-radius:14px;line-height:1.5;animation:in2 .3s}@keyframes in2{from{opacity:0;transform:translateY(8px)}}
.m.b{background:#fff;border:1px solid var(--ln);align-self:flex-start;border-bottom-left-radius:4px}.m.u{background:var(--ch);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}
.cs{display:flex;flex-wrap:wrap;gap:6px;padding:10px 20px 0}.cs button{padding:6px 12px;border:1.5px solid var(--rg);background:#fff;color:var(--rgd);border-radius:99px;font:600 12.5px var(--f);cursor:pointer}.cs button:hover{background:var(--rg);color:#fff}
#cf{display:flex;gap:8px;padding:10px 14px}#cf input{flex:1;padding:12px 16px;border:1.5px solid var(--ln);border-radius:10px;font:400 14.5px var(--f);outline:none;min-width:0}#cf input:focus{border-color:var(--rg)}
#cf button{padding:0 18px;border:0;border-radius:10px;background:var(--ch);color:#fff;cursor:pointer}
#wa{display:block;text-align:center;padding:10px;background:#1FA855;color:#fff;font:600 13.5px var(--f)}
:focus-visible{outline:2px solid var(--rg);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<div class="ut"><div class="wrap"><span>Senin sampai Sabtu, <b>08.00 sampai 17.00</b> (contoh)</span><span>WhatsApp servis: <b>ganti dengan nomor Anda</b></span></div></div>
<nav><div class="wrap"><a class="lg" href="#top"><i></i>Roseline<small>Service Center</small></a><ul><li><a href="#antrean">Antrean</a></li><li><a href="#inspeksi">Inspeksi</a></li><li><a href="#penawaran">Penawaran</a></li><li><a href="#armada">Armada</a></li></ul><a class="btn m" href="#penawaran">Buat penawaran</a><button type="button" id="roseline-menu-button" aria-expanded="false" aria-controls="roseline-menu" aria-label="Buka menu">☰</button></div></nav>
<div id="roseline-menu" aria-label="Menu utama" aria-hidden="true"><a href="#antrean">Antrean</a><a href="#inspeksi">Inspeksi</a><a href="#penawaran">Penawaran</a><a href="#armada">Armada</a><a href="#penawaran">Buat penawaran</a></div>

<header class="hero" id="top"><div class="wrap"><span class="ey">Servis kendaraan yang transparan</span>
<h1>Tahu apa yang dikerjakan, <span>sebelum dikerjakan.</span></h1>
<p>Setiap kendaraan melewati inspeksi, laporan digital, dan penawaran tertulis. Anda memutuskan, kami mengerjakan.</p>
<div class="hc"><a class="btn m" href="#penawaran">Hitung estimasi servis</a><a class="btn o" href="#inspeksi">Lihat contoh laporan</a></div>
<div class="tr"><div><b>30 titik</b><span>inspeksi pada setiap kendaraan</span></div><div><b>Tertulis</b><span>penawaran sebelum pengerjaan</span></div><div><b>Foto</b><span>temuan dikirim lewat WhatsApp</span></div></div>
<div class="fl" id="fl"></div></div></header>

<section class="bs" id="antrean"><div class="wrap"><div class="hd"><span class="ey" style="color:var(--rg2)">Papan antrean</span><h2>Lihat kendaraan Anda sedang di tahap mana.</h2><p>Setiap bay bekerja dengan status yang jelas, jadi Anda tidak perlu menebak kapan kendaraan selesai.</p></div>
<div class="bb"><div class="bh"><span>PAPAN ANTREAN · <b id="tm">--:--:--</b></span><span id="bq"></span></div><div id="bo"></div></div><p class="nt">Tampilan demo dengan data contoh yang bergerak otomatis. Nomor polisi disamarkan untuk privasi pelanggan.</p></div></section>

<section id="inspeksi"><div class="wrap"><div class="hd"><span class="ey">Laporan inspeksi digital</span><h2>Temuan teknisi, disampaikan apa adanya.</h2><p>Setiap item diberi status yang mudah dipahami. Pilih yang ingin dikerjakan, dan item itu otomatis masuk ke penawaran.</p></div>
<div class="in"><div class="dn"><div class="c"><svg viewBox="0 0 100 100" id="dnv"></svg><b id="dnt"></b></div><div class="lgd"><span><i style="background:var(--ok)"></i>Baik</span><span><i style="background:var(--wn)"></i>Perlu perhatian</span><span><i style="background:var(--er)"></i>Segera ditangani</span></div></div>
<div><div class="fb" id="fb"><button aria-pressed="true" data-f="a">Semua temuan</button><button aria-pressed="false" data-f="n">Perlu tindakan</button><button aria-pressed="false" data-f="g">Kondisi baik</button></div><div id="it"></div><p class="nt" style="color:var(--mu)">Contoh laporan. Laporan sebenarnya disusun teknisi setelah pemeriksaan kendaraan Anda.</p></div></div></div></section>

<section class="qt" id="penawaran"><div class="wrap"><div class="hd"><span class="ey">Penawaran servis</span><h2>Susun penawaran tertulis dalam hitungan detik.</h2><p>Pilih layanan, isi data kendaraan, dan dokumen penawaran terbentuk langsung. Kirim ke WhatsApp untuk dikonfirmasi.</p></div>
<div class="qg"><div class="qp"><span class="ey">Pilih layanan</span><div id="qs" style="margin-top:8px"></div>
<label class="l" for="qk">Kategori kendaraan</label><select id="qk"><option value="1">City car atau hatchback</option><option value="1.15">Sedan atau MPV</option><option value="1.35">SUV atau kendaraan premium</option></select>
<label class="l" for="qn">Nama</label><input type="text" id="qn" placeholder="Nama atau perusahaan"><label class="l" for="qv">Kendaraan</label><input type="text" id="qv" placeholder="Contoh: Toyota Avanza 2018"><label class="l" for="qd">Tanggal kedatangan</label><input type="date" id="qd"><label class="l" for="qj">Jam</label><select id="qj"><option>08.00</option><option>10.00</option><option>13.00</option><option>15.00</option></select>
<label class="sv" style="margin-top:12px"><span><input type="checkbox" id="qp" checked>Tampilkan harga termasuk PPN</span></label></div>
<div class="dc"><h3>Penawaran servis</h3><div class="dm"><span id="dn_"></span><span id="dt_"></span></div><div class="dk"><span>Kepada</span><b id="dk1"></b><span>Kendaraan</span><b id="dk2"></b><span>Jadwal</span><b id="dk3"></b></div><div id="dl"></div><div id="tl"></div><p class="ft">Estimasi awal, berlaku 7 hari, dan dapat berubah setelah inspeksi. Tarif pajak mengikuti ketentuan yang berlaku.</p><a class="btn m" id="qb" href="#" target="_blank" rel="noopener" style="width:100%;justify-content:center">Kirim penawaran ke WhatsApp</a></div></div></div></section>

<section id="armada"><div class="wrap"><div class="hd"><span class="ey">Armada dan korporat</span><h2>Kendaraan operasional tetap jalan, biaya tetap terkendali.</h2></div>
<div class="ar"><div class="ac"><svg viewBox="0 0 48 48"><rect x="6" y="10" width="36" height="28" rx="3"/><path d="M6 18h36M16 26h8M16 32h16"/></svg><h3>Kontrak servis berkala</h3><p>Jadwal perawatan terencana untuk seluruh unit, dengan prioritas pengerjaan.</p></div><div class="ac"><svg viewBox="0 0 48 48"><path d="M10 6h28v36l-5-4-4 4-5-4-5 4-4-4-5 4z"/><path d="M17 16h14M17 24h14"/></svg><h3>Invoice terpusat</h3><p>Satu tagihan untuk banyak unit, lengkap dengan faktur pajak sesuai kebutuhan.</p></div><div class="ac"><svg viewBox="0 0 48 48"><path d="M6 40V8M6 40h36"/><path d="M12 32l8-10 8 6 12-16"/></svg><h3>Laporan biaya per unit</h3><p>Riwayat dan biaya setiap kendaraan terekam rapi untuk evaluasi anggaran.</p></div></div>
<div style="margin-top:34px"><a class="btn m" href="#" data-wa="Halo Roseline, saya ingin konsultasi layanan servis armada perusahaan.">Konsultasi armada</a></div></div></section>

<footer><div class="wrap"><div class="fg"><div><div class="lg" style="color:#fff"><i></i>Roseline</div><p style="margin-top:12px;max-width:340px">Pusat servis kendaraan dengan proses transparan. Template contoh, ganti seluruh isi dengan data bisnis Anda.</p></div><div><h3>Menu</h3><ul><li><a href="#antrean">Antrean</a></li><li><a href="#inspeksi">Inspeksi</a></li><li><a href="#penawaran">Penawaran</a></li><li><a href="#armada">Armada</a></li></ul></div><div><h3>Kontak</h3><ul><li>Alamat bengkel (ganti)</li><li>Senin sampai Sabtu, 08.00 sampai 17.00 (contoh)</li><li>WhatsApp (ganti)</li></ul></div></div><p class="cp">Seluruh harga, data antrean, dan laporan inspeksi adalah contoh. Tarif pajak dan ketentuan lain perlu disesuaikan dengan peraturan yang berlaku. Temuan dan rekomendasi servis ditentukan teknisi setelah pemeriksaan langsung.</p></div></footer>

<div id="cp" role="dialog" aria-label="Service advisor"><header><div><b>Service Advisor</b><small>● online</small></div><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaan Anda…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">➤</button></form><a id="wa" href="#" target="_blank" rel="noopener">Lanjutkan ke WhatsApp →</a></div>
<div id="cb"><span>Butuh bantuan memilih layanan?</span><button class="btn m" id="ob">Chat dengan Service Advisor</button></div>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Roseline Service Center",PPN=.11;/* PPN: sesuaikan dengan ketentuan pajak yang berlaku */
const $=i=>document.getElementById(i),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID"),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
const element=(tag,className,text)=>{const node=document.createElement(tag);if(className)node.className=className;if(text!==undefined)node.textContent=text;return node};
const roselineMenu=$("roseline-menu"),roselineMenuButton=$("roseline-menu-button");
function setRoselineMenu(open){roselineMenu.classList.toggle("open",open);roselineMenu.setAttribute("aria-hidden",String(!open));roselineMenuButton.setAttribute("aria-expanded",String(open));roselineMenuButton.textContent=open?"✕":"☰"}
roselineMenuButton.onclick=()=>setRoselineMenu(!roselineMenu.classList.contains("open"));
roselineMenu.querySelectorAll("a").forEach(link=>link.onclick=()=>setRoselineMenu(false));
addEventListener("keydown",event=>{if(event.key==="Escape")setRoselineMenu(false)});
document.querySelectorAll("[data-wa]").forEach(a=>{a.href=wl(a.dataset.wa);a.target="_blank";a.rel="noopener"});
/* alur */
const FL=[["Terima","Data kendaraan dan keluhan dicatat"],["Inspeksi","30 titik diperiksa teknisi"],["Penawaran","Biaya tertulis sebelum dikerjakan"],["Pengerjaan","Dikerjakan sesuai persetujuan"],["Serah terima","Penjelasan dan uji akhir"]];
fl.replaceChildren(...FL.map((step,index)=>{const node=element("div","fs");const number=element("i","",String(index+1));const copy=element("div");copy.append(element("b","",step[0]),element("span","",step[1]));node.append(number,copy);return node}));
let fa=0;function fstep(){[...fl.children].forEach((e,i)=>{e.classList.toggle("on",i===fa);e.classList.toggle("dn",i<fa)});fl.style.setProperty("--w",(fa/4*80)+"%");fa=(fa+1)%5}fstep();setInterval(fstep,1700);
/* antrean */
const SVN=["Servis berkala","Ganti oli","Servis rem","Servis AC","Spooring","Diagnostik"],MD=["Toyota Avanza","Honda Brio","Suzuki Ertiga","Mitsubishi Xpander","Daihatsu Terios","Honda HR-V","Toyota Yaris","Suzuki Jimny"],PL=["L 12•• AB","N 38•• KD","W 07•• CA","AG 91•• FB","L 55•• MN","S 20•• RT"];
const SL=[["Menunggu","#9AA0AE"],["Inspeksi","#6C8FC9"],["Dikerjakan","#E0A021"],["Quality check","#E3A99F"],["Selesai","#2E9E6B"]];
let rn=3;const rd=a=>a[(rn=(rn*7+11)%97)%a.length];
const Q=[0,1,2,3,4,5].map(i=>({p:PL[i],m:MD[i],s:SVN[i],st:[2,3,1,0,2,4][i],f:-1}));
function eta(q){const d=new Date(Date.now()+(4-q.st)*25*60000);return d.toLocaleTimeString("id-ID",{hour:"2-digit",minute:"2-digit"}).replace(".",":")}
function board(){const header=element("div","br hd2");header.append(...["Bay","Kendaraan","Layanan","Status","Estimasi"].map(text=>element("span","",text)));const rows=Q.map((q,i)=>{const row=element("div","br"+(q.f>0?" fl2":""));const vehicle=element("span","",q.m);vehicle.append(element("small","",q.p));const status=element("span","sb"+(q.st<4?" p":""));status.style.setProperty("--c",SL[q.st][1]);status.textContent=SL[q.st][0];row.append(element("span","",String(i+1).padStart(2,"0")),vehicle,element("span","",q.s),status,element("span","",q.st===4?"selesai":eta(q)));return row});bo.replaceChildren(header,...rows);
const w=Q.filter(q=>q.st<2).length,a=Q.filter(q=>q.st<4).length;bq.replaceChildren(element("b","",String(a)),document.createTextNode(" unit dalam proses · perkiraan tunggu baru "),element("b","",String(15+w*20)),document.createTextNode(" menit"));Q.forEach(q=>q.f--)}
function tick(){const o=Q.map((q,i)=>[q,i]).filter(([q])=>q.st<4),d=Q.map((q,i)=>[q,i]).filter(([q])=>q.st===4);
if(d.length&&(rn%3===0||!o.length)){const [,i]=d[0];Q[i]={p:rd(PL),m:rd(MD),s:rd(SVN),st:0,f:2}}else if(o.length){const [q]=o[(rn=(rn*5+3)%89)%o.length];q.st++;q.f=2}board()}
board();setInterval(tick,3500);
setInterval(()=>tm.textContent=new Date().toLocaleTimeString("id-ID").replace(/\./g,":"),1000);tm.textContent=new Date().toLocaleTimeString("id-ID").replace(/\./g,":");
/* layanan penawaran */
const SV=[["Inspeksi 30 titik dan konsultasi",150000],["Ganti oli mesin dan filter oli",450000],["Servis berkala (sedang)",850000],["Servis rem (kampas dan pembersihan)",600000],["Servis AC",550000],["Spooring dan balancing",400000],["Cek dan jasa penggantian aki",150000],["Cek suspensi dan kaki-kaki",400000],["Scan diagnostik",250000]];
const SEL=new Set([0]);
qs.replaceChildren(...SV.map((service,index)=>{const label=element("label","sv");const span=element("span");const input=document.createElement("input");input.type="checkbox";input.dataset.i=String(index);input.checked=index===0;span.append(input,document.createTextNode(service[0]));const price=element("em");price.dataset.p=String(index);label.append(span,price);return label}));
qs.onchange=e=>{const c=e.target.closest("input");if(c){c.checked?SEL.add(+c.dataset.i):SEL.delete(+c.dataset.i);quote()}};
const dtt=new Date();dtt.setDate(dtt.getDate()+1);qd.min=dtt.toISOString().slice(0,10);
const nm="PNW-"+new Date().toISOString().slice(2,10).replace(/-/g,"")+"-"+String(100+Math.floor(Math.random()*900));
function quote(){const k=+qk.value,ids=[...SEL].sort((a,b)=>a-b);SV.forEach((s,i)=>qs.querySelector(`[data-p="${i}"]`).textContent=rp(s[1]*k));qs.querySelectorAll("input").forEach(c=>c.checked=SEL.has(+c.dataset.i));
let sub=0;const quoteRows=ids.length?ids.map(index=>{const price=SV[index][1]*k;sub+=price;const row=element("div","dl");row.append(element("span","",SV[index][0]),element("span","",rp(price)));return row}):[(()=>{const row=element("div","dl e");row.append(element("span","","Belum ada layanan dipilih"),element("span","","-"));return row})()];dl.replaceChildren(...quoteRows);
const ppn=qp.checked?sub*PPN:0;const totals=[(()=>{const row=element("div","tt");row.append(element("span","","Subtotal"),element("span","",rp(sub)));return row})()];if(qp.checked){const tax=element("div","tt");tax.append(element("span","",`PPN (${Math.round(PPN*100)}%)`),element("span","",rp(ppn)));totals.push(tax)}const grand=element("div","tt g");grand.append(element("span","","Total estimasi"),element("span","",rp(sub+ppn)));totals.push(grand);tl.replaceChildren(...totals);
dn_.textContent="No. "+nm;dt_.textContent=new Date().toLocaleDateString("id-ID",{day:"numeric",month:"long",year:"numeric"});
const d=qd.value?new Date(qd.value+"T00:00").toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"})+", "+qj.value:"belum dipilih";
dk1.textContent=qn.value||"-";dk2.textContent=qv.value||"-";dk3.textContent=d;
qb.href=wl(`Halo ${BRAND}, saya ${qn.value||"calon pelanggan"} dengan kendaraan ${qv.value||"(belum diisi)"}.\nSaya ingin penawaran ${nm}:\n${ids.map(i=>"- "+SV[i][0]+" ("+rp(SV[i][1]*k)+")").join("\n")}\nTotal estimasi ${rp(sub+ppn)}${qp.checked?" (termasuk PPN)":""}.\nKedatangan: ${d}.\nMohon konfirmasi.`)}
[qk,qn,qv,qd,qj,qp].forEach(e=>e.oninput=quote);quote();
/* inspeksi */
const IT=[["Oli mesin",1,"Mendekati batas penggantian. Disarankan ganti dalam waktu dekat.",1],["Filter udara",1,"Kotor sedang. Pertimbangkan penggantian saat servis berkala.",2],["Kampas rem depan",2,"Ketebalan tersisa sekitar 15%. Sebaiknya segera diganti.",3],["Kampas rem belakang",0,"Kondisi baik.",null],["Minyak rem",1,"Kadar air mulai meningkat. Disarankan penggantian.",3],["Ban depan",0,"Alur ban masih baik.",null],["Ban belakang",1,"Alur mulai menipis. Periksa balancing dan tekanan.",5],["Aki",0,"Tegangan dan pengisian normal.",null],["Lampu-lampu",0,"Seluruh lampu berfungsi.",null],["Sistem pendingin",0,"Tidak ditemukan kebocoran.",null],["Karet suspensi",1,"Retak halus pada karet. Pantau, periksa saat servis berikutnya.",7],["Wiper",0,"Kondisi baik.",null]];
const SC=["#2E9E6B","#E0A021","#D64545"];let FF="a";
function insp(){const c=[0,0,0];IT.forEach(r=>c[r[1]]++);let off=0;const base=document.createElementNS("http://www.w3.org/2000/svg","circle");base.setAttribute("cx","50");base.setAttribute("cy","50");base.setAttribute("r","38");base.setAttribute("stroke","#F0E4E0");const arcs=c.map((n,i)=>{const length=n/IT.length*238.76;const arc=document.createElementNS("http://www.w3.org/2000/svg","circle");arc.setAttribute("cx","50");arc.setAttribute("cy","50");arc.setAttribute("r","38");arc.setAttribute("stroke",SC[i]);arc.setAttribute("stroke-dasharray",`${Math.max(0,length-2)} 240`);arc.setAttribute("stroke-dashoffset",String(-off));off+=length;return arc});dnv.replaceChildren(base,...arcs);dnt.replaceChildren(document.createTextNode(String(IT.length)),element("small","", "titik diperiksa"));
const findings=IT.filter(r=>FF==="a"||(FF==="n"?r[1]>0:r[1]===0)).map(record=>{const row=element("div","ir");row.style.setProperty("--c",SC[record[1]]);row.append(element("i"),element("b","",record[0]),element("small","",record[2]));if(record[3]!==null){const button=element("button",""+(SEL.has(record[3])?"on":""),SEL.has(record[3])?"Masuk penawaran ✓":"Tambah ke penawaran");button.dataset.s=String(record[3]);row.append(button)}return row});it.replaceChildren(...findings)}
fb.onclick=e=>{const b=e.target.closest("button");if(b){FF=b.dataset.f;fb.querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed",x===b));insp()}};
it.onclick=e=>{const b=e.target.closest("button");if(b){const i=+b.dataset.s;SEL.has(i)?SEL.delete(i):SEL.add(i);quote();insp()}};insp();
/* chat */
const KB=[
[/harga|biaya|berapa|tarif/,()=>"Harga contoh: inspeksi "+rp(150000)+", ganti oli "+rp(450000)+", servis rem "+rp(600000)+". Gunakan bagian Penawaran untuk menyusun estimasi tertulis, dan harga final setelah inspeksi.",["Penawaran","Pajak dan invoice"]],
[/ppn|pajak|invoice|faktur|npwp/,()=>"Penawaran dapat ditampilkan termasuk PPN, dan invoice atau faktur pajak diterbitkan sesuai kebutuhan dan ketentuan yang berlaku.",["Armada","Penawaran"]],
[/antre|antri|status|selesai|kapan/,()=>"Lihat Papan antrean untuk contoh pemantauan status tiap bay. Untuk status kendaraan Anda, tim kami bisa memberi kabar lewat WhatsApp.",["Lanjut ke WhatsApp"]],
[/inspeksi|laporan|temuan|periksa/,()=>"Setiap kendaraan diinspeksi 30 titik. Hasilnya dilaporkan dengan status baik, perlu perhatian, atau segera ditangani. Lihat contoh di bagian Inspeksi.",["Penawaran","Harga"]],
[/armada|korporat|perusahaan|kontrak|fleet/,()=>"Untuk armada tersedia kontrak servis berkala, invoice terpusat, dan laporan biaya per unit. Konsultasikan kebutuhan Anda lewat WhatsApp.",["Lanjut ke WhatsApp"]],
[/rem|blong|asap|gosong|darurat/,()=>"Jika rem terasa blong atau ada asap dan bau gosong, hentikan kendaraan di tempat aman dan jangan dilanjutkan. Hubungi kami atau layanan derek.",["Lanjut ke WhatsApp"]],
[/jam|buka|lokasi|alamat/,()=>"Jam buka dan alamat tertera di bagian atas dan bawah halaman, dan akan diganti sesuai data bengkel.",["Penawaran"]],
[/garansi|klaim/,()=>"Ketentuan garansi berbeda tiap jenis pekerjaan dan akan dijelaskan tertulis sebelum Anda menyetujui pengerjaan.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Roseline Service Center. Ada yang bisa kami bantu?",["Harga","Penawaran","Inspeksi","Armada"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren(...a.map(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);return b}))}
function waU(){wa.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi servis."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|advisor|teknisi/i.test(t)){setTimeout(()=>{say("Baik, klik tombol WhatsApp di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab service advisor kami. Klik WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Harga","Penawaran","Inspeksi"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;function tg(){cp.classList.toggle("open");if(cp.classList.contains("open")&&fi){fi=false;say("Selamat datang. Saya asisten virtual Roseline untuk info layanan, penawaran, dan jadwal. Saya tidak memberi diagnosis pasti.","b");chips(["Harga","Penawaran","Inspeksi","Armada"]);waU()}}
ob.onclick=tg;x.onclick=tg;
</script>
</body>
</html>
@endverbatim
