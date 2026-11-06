<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk — PawMart</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-produk-minimalist-glacierblue.css') }}">
</head>
<body>

<header class="detail-header">
    <a class="detail-logo" href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">
        🐾 <span>Paw<strong>Mart</strong></span>
    </a>
    <nav>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">Home</a>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">Katalog</a>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue#contact') }}">Kontak</a>
    </nav>
    <button class="detail-header-help" id="detailHelp">💬 Tanya Admin</button>
</header>

<main class="detail-main">
    <div class="detail-breadcrumb">
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">Home</a>
        <span>/</span>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">Katalog</a>
        <span>/</span>
        <span id="breadcrumbProduct">Detail Produk</span>
    </div>

    <section class="detail-product">
        <div class="detail-gallery">
            <div class="detail-main-image" id="detailImageBox">
                <span class="detail-image-badge" id="detailBadge">PAWMART PICK</span>
                <img id="detailImage" src="" alt="Foto produk">
            </div>
            <div class="detail-image-caption">🐾 Selected with love for your furry friend</div>
        </div>

        <div class="detail-info">
            <span class="detail-eyebrow" id="detailCategory">PET ESSENTIALS</span>
            <h1 id="detailName">Nama Produk</h1>
            <div class="detail-rating">★★★★★ <span>Produk pilihan PawMart</span></div>
            <div class="detail-price" id="detailPrice">Rp0</div>
            <p class="detail-description" id="detailDescription"></p>

            <div class="detail-stock" id="detailStock">
                <span></span> Tanyakan ketersediaan stok kepada admin
            </div>

            <div class="detail-divider"></div>

            <h3>Jumlah pesanan</h3>
            <div class="detail-quantity">
                <button id="quantityMinus" aria-label="Kurangi jumlah">−</button>
                <input id="quantityInput" type="number" value="1" min="1" max="99" inputmode="numeric" aria-label="Jumlah pesanan">
                <button id="quantityPlus" aria-label="Tambah jumlah">+</button>
            </div>

            <div class="detail-actions">
                <button class="detail-order-button" id="orderButton">Pesan via WhatsApp ↗</button>
                <button class="detail-stock-button" id="stockButton">Tanya Stok</button>
            </div>

            <div class="detail-points">
                <div><span>💬</span><p><strong>Pesan langsung</strong><small>Konfirmasi dengan admin</small></p></div>
                <div><span>📦</span><p><strong>Informasi stok</strong><small>Konfirmasi sebelum memesan</small></p></div>
                <div><span>💙</span><p><strong>Butuh rekomendasi?</strong><small>Kami siap membantu</small></p></div>
            </div>
        </div>
    </section>

    <section class="detail-description-section">
        <span class="detail-eyebrow">PRODUCT INFORMATION</span>
        <h2>More about <span id="descriptionProductName">this product.</span></h2>
        <p id="detailLongDescription"></p>
        <div class="detail-note">
            <strong>💡 Catatan untuk pet parents</strong>
            <p>Informasi harga, ukuran, varian, dan ketersediaan perlu dikonfirmasi kepada admin sebelum melakukan pemesanan.</p>
        </div>
    </section>

    <section class="detail-help">
        <div>
            <span class="detail-eyebrow">WE'RE HERE TO HELP</span>
            <h2>Have questions about this product?</h2>
            <p>Tanyakan cara penggunaan, varian, rekomendasi, atau ketersediaan produk kepada tim PawMart.</p>
        </div>
        <button id="detailQuestionButton">Tanya Produk ↗</button>
    </section>
</main>

<footer class="detail-footer">
    <a class="detail-logo" href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">🐾 <span>Paw<strong>Mart</strong></span></a>
    <p>Made with love for every paw and whisker. 🐾</p>
    <small>© {{ date('Y') }} PawMart. All rights reserved.</small>
</footer>

<script>
window.PAWMART_CONFIG = {
    whatsappNumber: '6285850180285',
    productSlug: @json(request()->route('slug'))
};
</script>
<script src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-produk-minimalist-glacierblue.js') }}"></script>
</body>
</html>