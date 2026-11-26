@extends('auth.layout')

@section('title', 'Detail Pesanan')

@section('content')
    @php $uploadedAt = $order->payments->last()?->created_at ?? $order->logs->where('to_status', 'payment_uploaded')->last()?->created_at; @endphp
    <style>
        .kb-editor-status { display: inline-flex; align-items: center; gap: .35rem; margin-top: .5rem; font-size: .78rem; color: #64748b; }
        .kb-editor-status::before { content: ''; width: .5rem; height: .5rem; border-radius: 999px; background: #94a3b8; }
        .kb-editor-status.is-dirty { color: #b45309; }
        .kb-editor-status.is-dirty::before { background: #f59e0b; }
        .kb-editor-status.is-saved { color: #15803d; }
        .kb-editor-status.is-saved::before { background: #22c55e; }
        @media (max-width: 640px) {
            .kb-tabs-row { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
            .kb-tabs-row button { white-space: normal !important; min-height: 44px; }
            .kb-two-column, .kb-card-two-column { grid-template-columns: 1fr !important; }
        }
    </style>
    <section class="dashboard-panel" aria-labelledby="order-title">
        <div class="customer-detail-head">
            <a class="customer-create-back" href="{{ route('orders.index') }}">
                <span aria-hidden="true" class="material-symbols-outlined">arrow_back</span>
                Kembali ke Pesanan Saya
            </a>
            <div class="customer-detail-row">
                <div>
                    <p class="customer-detail-id">{{ $order->order_number }}</p>
                    <h1 id="order-title" class="customer-detail-title">{{ $order->package->name }}</h1>
                    <div class="customer-detail-pills">
                        <x-status-pill :status="$order->status" with-icon />
                        <x-status-pill :status="$order->delivery_status" with-icon />
                    </div>
                </div>
                <div class="customer-detail-total">
                    <p>Total Tagihan</p>
                    <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>

        <section class="customer-create-card" aria-label="Tahapan pengerjaan">
            <h2 class="customer-steps-heading">
                <span aria-hidden="true" class="material-symbols-outlined">linear_scale</span>
                Timeline Pesanan
            </h2>
            <x-order-timeline :order="$order" :payment="$order->payments->last()" />
        </section>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <div class="customer-create-grid">
            <div class="customer-create-main">
                @if (in_array($order->status, ['awaiting_payment', 'rejected']))
                    <div class="customer-create-card" @if ($pendingPayment) data-payment-status-url="{{ route('orders.payment-status.authenticated', $order) }}" @endif>
                        <h2 class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">account_balance_wallet</span>
                            Bayar via Midtrans
                        </h2>
                        <p class="customer-create-option-desc">QRIS, virtual account, e-wallet, atau kartu kredit di halaman pembayaran Midtrans{{ config('webia.midtrans.server_key') ? '' : ' (mode simulasi lokal)' }}.</p>
                        <button class="account-submit customer-create-submit-btn" type="button" data-modal-open="#order-pay-modal">Bayar via Midtrans</button>
                        @if ($pendingPayment?->snap_redirect_url)
                            <p><a href="{{ $pendingPayment->snap_redirect_url }}">Lanjutkan sesi pembayaran sebelumnya</a></p>
                            <p class="customer-create-option-desc" data-payment-status-note role="status" aria-live="polite">Status pembayaran diperiksa otomatis.</p>
                        @endif
                        @if ($order->status === 'rejected') <p class="form-error">Bukti sebelumnya ditolak. Periksa catatan admin dan unggah kembali.</p> @endif
                    </div>

                    <div class="customer-create-card">
                        <h2 class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">account_balance</span>
                            Instruksi transfer
                        </h2>
                        @if (config('webia.payment_accounts'))
                            <ul class="customer-detail-accounts">
                                @foreach (config('webia.payment_accounts') as $account)
                                    <li><strong>{{ $account['bank'] }}</strong> {{ $account['number'] }} a.n. {{ $account['holder'] }}</li>
                                @endforeach
                            </ul>
                            <p class="customer-create-option-desc">Transfer sesuai total ke salah satu rekening di atas, lalu unggah bukti.</p>
                            @if (config('webia.payment_note'))<p class="customer-create-option-desc">{{ config('webia.payment_note') }}</p>@endif
                        @else
                            <p class="customer-create-option-desc">Transfer sesuai total ke rekening WEBIA yang dikonfirmasi tim, lalu unggah bukti di bawah.</p>
                        @endif
                        <button class="account-submit customer-create-submit-btn" type="button" data-modal-open="#order-upload-modal">Unggah bukti transfer</button>
                    </div>

                    @if ($order->status === 'rejected' && $order->logs->where('to_status', 'rejected')->last()?->note)
                        <div class="customer-create-card">
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">info</span>
                                Catatan admin
                            </h2>
                            <p class="customer-create-option-desc">{{ $order->logs->where('to_status', 'rejected')->last()->note }}</p>
                        </div>
                    @endif

                    <button class="customer-cancel-link" type="button" data-modal-open="#order-cancel-modal">
                        <span aria-hidden="true" class="material-symbols-outlined">close_small</span>
                        Batalkan pesanan
                    </button>
                @elseif ($order->status === 'payment_uploaded')
                    <section class="customer-create-card customer-verify-panel" role="status">
                        <span class="customer-verify-icon" aria-hidden="true">
                            <span class="material-symbols-outlined">hourglass_empty</span>
                        </span>
                        <h2>Menunggu verifikasi</h2>
                        <p>Admin sedang memeriksa bukti pembayaranmu. Proses verifikasi biasanya memakan waktu maksimal 1x24 jam kerja.</p>
                        @if ($uploadedAt)
                            <div class="customer-verify-meta">
                                <span>Waktu unggah bukti:</span>
                                <strong>{{ $uploadedAt->translatedFormat('d M Y H:i') }}</strong>
                            </div>
                        @endif
                        <p class="customer-verify-note">Formulir pembayaran dan upload dinonaktifkan sementara bukti diperiksa oleh admin.</p>
                    </section>
                @elseif ($order->status === 'paid')
                    @if ($order->delivery_status === 'delivered' && $order->site_slug)
                        <div class="customer-create-card">
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">verified</span>
                                Website kamu siap
                            </h2>
                            <p class="customer-create-option-desc">Data bisnismu sudah diterapkan ke template yang dipilih.</p>
                            <dl class="business-data-list">
                                <div><dt>URL</dt><dd>{{ route('sites.show', ['order' => $order->site_slug]) }}</dd></div>
                            </dl>
                            <div class="customer-create-submit">
                                <a class="account-submit customer-create-submit-btn" href="{{ route('sites.show', ['order' => $order->site_slug]) }}" rel="noopener" target="_blank">Buka website</a>
                            </div>
                            <p class="customer-create-note">Hubungi tim WEBIA jika data website perlu diubah.</p>
                        </div>
                    @elseif ($order->delivery_status === 'delivered')
                        <div class="customer-create-card">
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">verified</span>
                                Pesanan selesai
                            </h2>
                            <p class="customer-create-option-desc">Pesanan ini sudah selesai. Silakan hubungi tim WEBIA untuk perubahan data.</p>
                        </div>
                    @else
                        {{-- Segmented Navigation Tab Ala Webia --}}
                        <div style="margin-bottom: 1.25rem;">
                            <nav class="customer-filter" aria-label="Tab formulir pesanan">
                                <button type="button" id="tabBtnProfile" aria-current="page" onclick="switchOrderTab('profile')">
                                    <span class="material-symbols-outlined" style="font-size: 1.05rem;">storefront</span>
                                    Data Profil Website
                                </button>
                                @if ($order->customer_ai_knowledge_editable ?? true)
                                    <button type="button" id="tabBtnKnowledge" onclick="switchOrderTab('ai-kb')">
                                        <span class="material-symbols-outlined" style="font-size: 1.05rem;">psychology</span>
                                        Knowledge Base AI
                                    </button>
                                @endif
                            </nav>
                        </div>

                        {{-- Panel 1: Data Profil Website --}}
                        <div id="panelOrderProfile">
                            <div class="customer-create-card">
                                <h2 class="customer-create-legend">
                                    <span aria-hidden="true" class="material-symbols-outlined">edit_note</span>
                                    {{ $order->business_data ? 'Data Profil Bisnis' : 'Isi Data Profil Bisnis' }}
                                </h2>

                                @if ($order->business_data)
                                    <dl class="business-data-list" style="margin-bottom: 1.5rem;">
                                        <div><dt>Nama usaha</dt><dd>{{ $order->business_data['business_name'] }}</dd></div>
                                        @if ($order->business_data['tagline'] ?? null)<div><dt>Tagline</dt><dd>{{ $order->business_data['tagline'] }}</dd></div>@endif
                                        @if ($order->business_data['whatsapp'] ?? null)<div><dt>WhatsApp</dt><dd>{{ $order->business_data['whatsapp'] }}</dd></div>@endif
                                        @if ($order->business_data['description'] ?? null)<div><dt>Deskripsi</dt><dd>{{ $order->business_data['description'] }}</dd></div>@endif
                                        @if ($order->business_data['address'] ?? null)<div><dt>Alamat</dt><dd>{{ $order->business_data['address'] }}@if ($order->business_data['city'] ?? null), {{ $order->business_data['city'] }}@endif</dd></div>@endif
                                        @if ($order->business_data['address_url'] ?? null)<div><dt>Google Maps</dt><dd><a href="{{ $order->business_data['address_url'] }}" rel="noopener">Lihat lokasi</a></dd></div>@endif
                                        @if ($order->business_data['instagram'] ?? null)<div><dt>Instagram</dt><dd>{{ $order->business_data['instagram'] }}</dd></div>@endif
                                    </dl>
                                @endif

                                <p class="customer-create-option-desc">Isi data profil di bawah agar tim WEBIA bisa menerapkan identitas brand Anda ke website. Data bisa diubah sampai pesanan selesai.</p>

                                @php $business = $order->business_data ?? []; @endphp
                                <form method="POST" action="{{ route('orders.business', $order) }}" style="margin-top: 1.25rem;">
                                    @csrf
                                    <div class="form-field"><label for="business_name">Nama usaha</label><input id="business_name" name="business_name" type="text" value="{{ old('business_name', $business['business_name'] ?? '') }}" required>@error('business_name') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="tagline">Tagline (opsional)</label><input id="tagline" name="tagline" type="text" value="{{ old('tagline', $business['tagline'] ?? '') }}">@error('tagline') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="whatsapp">Nomor WhatsApp {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="whatsapp" name="whatsapp" type="text" inputmode="tel" value="{{ old('whatsapp', $business['whatsapp'] ?? '') }}" @required($order->supportsCustomerSite())>@error('whatsapp') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="description">Deskripsi usaha (opsional)</label><textarea id="description" name="description" rows="3">{{ old('description', $business['description'] ?? '') }}</textarea>@error('description') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="address">Alamat usaha {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="address" name="address" type="text" value="{{ old('address', $business['address'] ?? '') }}" @required($order->supportsCustomerSite())>@error('address') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="city">Kota {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="city" name="city" type="text" value="{{ old('city', $business['city'] ?? '') }}" @required($order->supportsCustomerSite())>@error('city') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="address_url">Link lokasi Google Maps (opsional)</label><input id="address_url" name="address_url" type="url" value="{{ old('address_url', $business['address_url'] ?? '') }}">@error('address_url') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="form-field"><label for="instagram">Instagram (opsional)</label><input id="instagram" name="instagram" type="text" value="{{ old('instagram', $business['instagram'] ?? '') }}">@error('instagram') <p class="form-error">{{ $message }}</p> @enderror</div>
                                    <div class="customer-create-submit">
                                        <button class="account-submit customer-create-submit-btn" type="submit">Simpan Data Profil</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- Panel 2: Knowledge Base Asisten AI --}}
                        @if ($order->customer_ai_knowledge_editable ?? true)
                        <div id="panelOrderKnowledge" style="display: none;">
                            @php
                                $siteSlug = $order->site_slug;
                                $kb = $siteSlug ? \App\Services\AiQuotaService::getTenantKnowledge($siteSlug) : [];
                                
                                $kbLayanan = old('kb_layanan', $business['kb_layanan'] ?? ($kb['layanan'] ?? ''));
                                $kbFaq = old('kb_faq', $business['kb_faq'] ?? (!empty($kb['faq_raw']) ? $kb['faq_raw'] : (is_string($kb['faq'] ?? null) ? $kb['faq'] : '')));
                                $kbKebijakan = old('kb_kebijakan', $business['kb_kebijakan'] ?? ($kb['kebijakan'] ?? ''));
                                $kbProfil = old('kb_profil', $business['kb_profil'] ?? ($kb['profil'] ?? ''));
                            @endphp

                            <form class="customer-create-card" method="POST" action="{{ route('orders.knowledge-base', $order) }}" id="orderKnowledgeForm" onsubmit="syncAllStructuredToRaw()">
                                @csrf
                                <div>
                                    <h2 class="customer-create-legend" style="margin: 0;">
                                        <span aria-hidden="true" class="material-symbols-outlined">psychology</span>
                                        Knowledge Base Asisten AI
                                    </h2>
                                    <p class="customer-create-option-desc" style="margin-top: 0.35rem;">
                                        Tambahkan informasi yang memang berlaku untuk bisnis Anda. Setiap bagian bersifat opsional dan tidak dibatasi jenis usaha tertentu.
                                    </p>
                                    <p id="kbEditorStatus" class="kb-editor-status" role="status">Belum ada perubahan</p>
                                </div>

                                {{-- Sub-dokumen segmented filter (1 baris penuh tanpa teks .md) --}}
                                <div style="margin: 1.25rem 0 1rem; width: 100%;">
                                    <nav class="customer-filter kb-tabs-row" aria-label="Pilih kategori knowledge base" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; width: 100%;">
                                        <button type="button" id="subBtnLayanan" aria-current="page" onclick="switchKbSubDoc('layanan')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">restaurant_menu</span>
                                            Informasi
                                        </button>
                                        <button type="button" id="subBtnFaq" onclick="switchKbSubDoc('faq')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">help</span>
                                            FAQ
                                        </button>
                                        <button type="button" id="subBtnKebijakan" onclick="switchKbSubDoc('kebijakan')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">policy</span>
                                            Kebijakan
                                        </button>
                                        <button type="button" id="subBtnProfil" onclick="switchKbSubDoc('profil')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">badge</span>
                                            Profil
                                        </button>
                                    </nav>
                                </div>

                                {{-- Hidden textareas to submit markdown to backend --}}
                                <textarea id="kb_layanan" name="kb_layanan" style="display: none;">{{ $kbLayanan }}</textarea>
                                <textarea id="kb_faq" name="kb_faq" style="display: none;">{{ $kbFaq }}</textarea>
                                <textarea id="kb_kebijakan" name="kb_kebijakan" style="display: none;">{{ $kbKebijakan }}</textarea>
                                <textarea id="kb_profil" name="kb_profil" style="display: none;">{{ $kbProfil }}</textarea>

                                {{-- ======================================================== --}}
                                {{-- Tab 1: Informasi bisnis --}}
                                {{-- ======================================================== --}}
                                <div id="subDocLayanan" class="kb-sub-doc">
                                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">info</span>
                                        <span>Tambahkan informasi yang sering ditanyakan: produk, jasa, program, fasilitas, area, proses, portofolio, atau informasi lain yang relevan untuk bisnis Anda.</span>
                                    </div>

                                    <div id="layananItemsContainer">
                                        {{-- Dynamic Layanan cards injected by JS --}}
                                    </div>

                                    <button type="button" onclick="addLayananItem()" style="display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; border: 1px dashed var(--account-action, #1a146b); color: var(--account-action, #1a146b); padding: 0.65rem 1rem; border-radius: 8px; font-size: 0.825rem; font-weight: 700; cursor: pointer; width: 100%; justify-content: center; margin-top: 0.5rem; transition: background 0.2s;">
                                        <span class="material-symbols-outlined" style="font-size: 1.15rem;">add_circle</span>
                                        Tambah Informasi
                                    </button>
                                </div>

                                {{-- ======================================================== --}}
                                {{-- Tab 2: FAQ --}}
                                {{-- ======================================================== --}}
                                <div id="subDocFaq" class="kb-sub-doc" style="display: none;">
                                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">help</span>
                                        <span>Daftar tanya jawab umum (FAQ). Saat pengunjung menanyakan hal serupa, Chatbot AI akan menjawab dengan akurat sesuai jawaban di sini.</span>
                                    </div>

                                    <div id="faqItemsContainer">
                                        {{-- Dynamic FAQ cards injected by JS --}}
                                    </div>

                                    <button type="button" onclick="addFaqItem()" style="display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; border: 1px dashed var(--account-action, #1a146b); color: var(--account-action, #1a146b); padding: 0.65rem 1rem; border-radius: 8px; font-size: 0.825rem; font-weight: 700; cursor: pointer; width: 100%; justify-content: center; margin-top: 0.5rem; transition: background 0.2s;">
                                        <span class="material-symbols-outlined" style="font-size: 1.15rem;">add_circle</span>
                                        Tambah Tanya &amp; Jawab (FAQ)
                                    </button>
                                </div>

                                {{-- ======================================================== --}}
                                {{-- Tab 3: Kebijakan --}}
                                {{-- ======================================================== --}}
                                <div id="subDocKebijakan" class="kb-sub-doc" style="display: none;">
                                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">policy</span>
                                        <span>Tambahkan aturan, batasan, proses, atau ketentuan yang harus dipatuhi chatbot. Isi hanya bagian yang benar-benar berlaku untuk bisnis Anda.</span>
                                    </div>

                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">payments</span>
                                                <strong style="font-size: 0.85rem; color: #1e293b;">1. Ketentuan utama (opsional)</strong>
                                            </div>
                                            <textarea id="kbPayment" rows="3" placeholder="Contoh: Ketentuan pemesanan, akses layanan, jadwal, atau aturan utama bisnis." oninput="syncKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                                        </div>

                                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">event_busy</span>
                                                <strong style="font-size: 0.85rem; color: #1e293b;">2. Batasan atau pengecualian (opsional)</strong>
                                            </div>
                                            <textarea id="kbCancel" rows="3" placeholder="Contoh: Hal yang tidak tersedia, syarat khusus, batas wilayah, atau batas waktu." oninput="syncKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                                        </div>

                                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">verified_user</span>
                                                <strong style="font-size: 0.85rem; color: #1e293b;">3. Proses tindak lanjut (opsional)</strong>
                                            </div>
                                            <textarea id="kbWarranty" rows="3" placeholder="Contoh: Cara menghubungi admin, alur pengajuan, atau tindak lanjut pertanyaan khusus." oninput="syncKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                                        </div>

                                        <div id="kebijakanExtraContainer">
                                            {{-- Extra dynamic policies --}}
                                        </div>

                                        <button type="button" onclick="addKebijakanExtra()" style="display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; border: 1px dashed var(--account-action, #1a146b); color: var(--account-action, #1a146b); padding: 0.65rem 1rem; border-radius: 8px; font-size: 0.825rem; font-weight: 700; cursor: pointer; width: 100%; justify-content: center; transition: background 0.2s;">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">add_circle</span>
                                            Tambah Kebijakan Lain
                                        </button>
                                    </div>
                                </div>

                                {{-- ======================================================== --}}
                                {{-- Tab 4: Profil --}}
                                {{-- ======================================================== --}}
                                <div id="subDocProfil" class="kb-sub-doc" style="display: none;">
                                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">badge</span>
                                        <span>Atur identitas bisnis serta gaya komunikasi yang diinginkan saat chatbot menyapa pengunjung.</span>
                                    </div>

                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <div class="kb-two-column" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                                            <div class="form-field" style="margin: 0;">
                                                <label for="profBrandName" style="font-size: 0.78rem;">Nama Brand / Usaha</label>
                                                <input type="text" id="profBrandName" value="{{ $business['business_name'] ?? 'Bisnis Klien' }}" oninput="syncProfilToRaw()">
                                            </div>
                                            <div class="form-field" style="margin: 0;">
                                                <label for="profTagline" style="font-size: 0.78rem;">Tagline Bisnis</label>
                                                <input type="text" id="profTagline" value="{{ $business['tagline'] ?? 'Layanan Profesional dan Terpercaya' }}" oninput="syncProfilToRaw()">
                                            </div>
                                        </div>

                                        <div class="form-field" style="margin: 0;">
                                            <label for="profTone" style="font-size: 0.78rem;">Gaya komunikasi</label>
                                            <select id="profTone" onchange="syncProfilToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;">
                                                <option value="Ramah, sopan, informatif, dan solutif.">Ramah, Sopan &amp; Solutif (Disarankan untuk Bisnis Jasa / Toko)</option>
                                                <option value="Kasual, santai, akrab, dan bersahabat.">Kasual, Santai &amp; Akrab (Cocok untuk Kafe / Brand Komunitas)</option>
                                                <option value="Formal, profesional, ringkas, dan presisi.">Formal, Profesional &amp; Korporat (Cocok untuk B2B / Konsultan)</option>
                                            </select>
                                        </div>

                                        <div class="form-field" style="margin: 0;">
                                            <label for="profGreeting" style="font-size: 0.78rem;">Sapaan pembuka</label>
                                            <textarea id="profGreeting" rows="3" placeholder="Sapaan yang diucapkan bot saat balon chat dibuka pengunjung..." oninput="syncProfilToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;">Halo! Selamat datang di {{ $business['business_name'] ?? 'website kami' }}, ada yang bisa kami bantu hari ini? 😊</textarea>
                                            <p class="form-hint" style="margin-top: 0.25rem;">Gunakan sapaan ramah agar chatbot terasa hidup dan menyenangkan bagi pelanggan.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer-create-submit" style="margin-top: 1.25rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
                                    <div style="font-size: 0.8rem; color: #64748b; display: flex; align-items: center; gap: 0.35rem;">
                                        <span class="material-symbols-outlined" style="font-size: 1rem; color: #16a34a;">sync</span>
                                        Data otomatis tersinkron ke asisten AI website
                                    </div>
                                    <button class="account-submit customer-create-submit-btn" type="submit">
                                        Simpan Knowledge Base AI
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endif

                        <script>
                            // Tab Switching: Data Profil vs Knowledge Base
                            function switchOrderTab(tab) {
                                const btnProfile = document.getElementById('tabBtnProfile');
                                const btnKnowledge = document.getElementById('tabBtnKnowledge');
                                const panelProfile = document.getElementById('panelOrderProfile');
                                const panelKnowledge = document.getElementById('panelOrderKnowledge');

                                if (tab === 'ai-kb') {
                                    if (panelProfile) panelProfile.style.display = 'none';
                                    if (panelKnowledge) panelKnowledge.style.display = 'block';
                                    if (btnKnowledge) btnKnowledge.setAttribute('aria-current', 'page');
                                    if (btnProfile) btnProfile.removeAttribute('aria-current');
                                } else {
                                    if (panelKnowledge) panelKnowledge.style.display = 'none';
                                    if (panelProfile) panelProfile.style.display = 'block';
                                    if (btnProfile) btnProfile.setAttribute('aria-current', 'page');
                                    if (btnKnowledge) btnKnowledge.removeAttribute('aria-current');
                                }
                            }

                            // Sub-dokumen Selector (layanan, faq, kebijakan, profil)
                            function switchKbSubDoc(doc) {
                                const docs = ['layanan', 'faq', 'kebijakan', 'profil'];
                                docs.forEach(function(d) {
                                    const el = document.getElementById('subDoc' + d.charAt(0).toUpperCase() + d.slice(1));
                                    const btn = document.getElementById('subBtn' + d.charAt(0).toUpperCase() + d.slice(1));
                                    if (d === doc) {
                                        if (el) el.style.display = 'block';
                                        if (btn) btn.setAttribute('aria-current', 'page');
                                    } else {
                                        if (el) el.style.display = 'none';
                                        if (btn) btn.removeAttribute('aria-current');
                                    }
                                });
                            }

                            // Dynamic Layanan Items
                            function addLayananItem(name = '', price = '', desc = '') {
                                const container = document.getElementById('layananItemsContainer');
                                if (!container) return;
                                const idx = container.querySelectorAll('.kb-layanan-card').length + 1;
                                const card = document.createElement('div');
                                card.className = 'kb-layanan-card';
                                card.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; margin-bottom: 0.85rem;';
                                card.innerHTML = `
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                                        <span style="font-weight: 700; font-size: 0.825rem; color: var(--account-action, #1a146b);">Paket / Produk #<span class="card-num">${idx}</span></span>
                                        <button type="button" onclick="removeLayananItem(this)" style="background: transparent; border: none; color: #dc2626; cursor: pointer; padding: 0; display: inline-flex; align-items: center;" title="Hapus Layanan">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">delete</span>
                                        </button>
                                    </div>
                                    <div class="kb-card-two-column" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.65rem; margin-bottom: 0.65rem;">
                                        <div>
                                            <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Judul informasi</label>
                                            <input type="text" class="lay-name" value="${escapeHtml(name)}" placeholder="Contoh: Area layanan atau program unggulan" oninput="syncLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                                        </div>
                                        <div>
                                            <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Nilai, harga, atau status (opsional)</label>
                                            <input type="text" class="lay-price" value="${escapeHtml(price)}" placeholder="Contoh: Mulai Rp150.000 atau Tersedia online" oninput="syncLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                                        </div>
                                    </div>
                                    <div>
                                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Deskripsi &amp; Detail Layanan</label>
                                        <textarea class="lay-desc" rows="2" placeholder="Jelaskan apa saja yang didapat, keunggulan, atau garansinya..." oninput="syncLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">${escapeHtml(desc)}</textarea>
                                    </div>
                                `;
                                container.appendChild(card);
                                syncLayananToRaw();
                            }

                            function removeLayananItem(btn) {
                                const card = btn.closest('.kb-layanan-card');
                                if (card) {
                                    card.remove();
                                    renumberCards('layananItemsContainer', '.card-num');
                                    syncLayananToRaw();
                                }
                            }

                            // Dynamic FAQ Items
                            function addFaqItem(question = '', answer = '') {
                                const container = document.getElementById('faqItemsContainer');
                                if (!container) return;
                                const idx = container.querySelectorAll('.kb-faq-card').length + 1;
                                const card = document.createElement('div');
                                card.className = 'kb-faq-card';
                                card.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; margin-bottom: 0.85rem;';
                                card.innerHTML = `
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                                        <span style="font-weight: 700; font-size: 0.825rem; color: var(--account-action, #1a146b);">Pertanyaan #<span class="card-num">${idx}</span></span>
                                        <button type="button" onclick="removeFaqItem(this)" style="background: transparent; border: none; color: #dc2626; cursor: pointer; padding: 0; display: inline-flex; align-items: center;" title="Hapus Tanya Jawab">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">delete</span>
                                        </button>
                                    </div>
                                    <div style="margin-bottom: 0.65rem;">
                                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Pertanyaan Pelanggan (Q)</label>
                                        <input type="text" class="faq-q" value="${escapeHtml(question)}" placeholder="Contoh: Bagaimana cara melakukan pemesanan?" oninput="syncFaqToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                                    </div>
                                    <div>
                                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Jawaban Akurat Chatbot (A)</label>
                                        <textarea class="faq-a" rows="2" placeholder="Jawaban resmi yang harus disampaikan oleh chatbot..." oninput="syncFaqToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">${escapeHtml(answer)}</textarea>
                                    </div>
                                `;
                                container.appendChild(card);
                                syncFaqToRaw();
                            }

                            function removeFaqItem(btn) {
                                const card = btn.closest('.kb-faq-card');
                                if (card) {
                                    card.remove();
                                    renumberCards('faqItemsContainer', '.card-num');
                                    syncFaqToRaw();
                                }
                            }

                            // Dynamic Kebijakan Extra
                            function addKebijakanExtra(title = '', content = '') {
                                const container = document.getElementById('kebijakanExtraContainer');
                                if (!container) return;
                                const card = document.createElement('div');
                                card.className = 'kb-keb-extra-card';
                                card.style.cssText = 'background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; margin-top: 0.85rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);';
                                card.innerHTML = `
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                        <input type="text" class="keb-extra-title" value="${escapeHtml(title)}" placeholder="Judul Kebijakan Tambahan (contoh: 4. Pengiriman Barang)" oninput="syncKebijakanToRaw()" style="font-weight: 700; font-size: 0.85rem; color: #1e293b; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.4rem 0.6rem; flex: 1; margin-right: 0.5rem;">
                                        <button type="button" onclick="removeKebijakanExtra(this)" style="background: transparent; border: none; color: #dc2626; cursor: pointer; padding: 0; display: inline-flex; align-items: center;" title="Hapus Kebijakan">
                                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">delete</span>
                                        </button>
                                    </div>
                                    <textarea class="keb-extra-content" rows="3" placeholder="Tuliskan ketentuan dan syarat kebijakan ini..." oninput="syncKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;">${escapeHtml(content)}</textarea>
                                `;
                                container.appendChild(card);
                                syncKebijakanToRaw();
                            }

                            function removeKebijakanExtra(btn) {
                                const card = btn.closest('.kb-keb-extra-card');
                                if (card) {
                                    card.remove();
                                    syncKebijakanToRaw();
                                }
                            }

                            function renumberCards(containerId, selector) {
                                const container = document.getElementById(containerId);
                                if (!container) return;
                                container.querySelectorAll(selector).forEach((el, i) => {
                                    el.textContent = i + 1;
                                });
                            }

                            function escapeHtml(text) {
                                if (!text) return '';
                                return String(text)
                                    .replace(/&/g, '&amp;')
                                    .replace(/</g, '&lt;')
                                    .replace(/>/g, '&gt;')
                                    .replace(/"/g, '&quot;');
                            }

                            // Synchronization Logic: Structured Form -> Raw Markdown Textareas
                            function syncLayananToRaw() {
                                const container = document.getElementById('layananItemsContainer');
                                const rawTextarea = document.getElementById('kb_layanan');
                                if (!container || !rawTextarea) return;

                                let md = "# Informasi Bisnis\n\n";
                                const cards = container.querySelectorAll('.kb-layanan-card');
                                cards.forEach(card => {
                                    const name = card.querySelector('.lay-name')?.value?.trim();
                                    const price = card.querySelector('.lay-price')?.value?.trim();
                                    const desc = card.querySelector('.lay-desc')?.value?.trim();
                                    if (name) {
                                        md += `- **${name}**: ${desc || 'Layanan unggulan'}${price ? '. ' + price : ''}.\n`;
                                    }
                                });
                                rawTextarea.value = md;
                            }

                            function syncFaqToRaw() {
                                const container = document.getElementById('faqItemsContainer');
                                const rawTextarea = document.getElementById('kb_faq');
                                if (!container || !rawTextarea) return;

                                let md = "# Tanya Jawab (FAQ)\n\n";
                                const cards = container.querySelectorAll('.kb-faq-card');
                                cards.forEach(card => {
                                    const q = card.querySelector('.faq-q')?.value?.trim();
                                    const a = card.querySelector('.faq-a')?.value?.trim();
                                    if (q && a) {
                                        md += `### Q: ${q}\nA: ${a}\n\n`;
                                    }
                                });
                                rawTextarea.value = md.trim() + "\n";
                            }

                            function syncKebijakanToRaw() {
                                const rawTextarea = document.getElementById('kb_kebijakan');
                                if (!rawTextarea) return;

                                const pay = document.getElementById('kbPayment')?.value?.trim();
                                const cancel = document.getElementById('kbCancel')?.value?.trim();
                                const warranty = document.getElementById('kbWarranty')?.value?.trim();

                                let md = "# Aturan & Ketentuan\n\n";
                                if (pay) md += `## 1. Ketentuan Utama\n${pay}\n\n`;
                                if (cancel) md += `## 2. Batasan atau Pengecualian\n${cancel}\n\n`;
                                if (warranty) md += `## 3. Proses Tindak Lanjut\n${warranty}\n\n`;

                                const extras = document.querySelectorAll('.kb-keb-extra-card');
                                extras.forEach((ex, idx) => {
                                    const t = ex.querySelector('.keb-extra-title')?.value?.trim() || `Ketentuan Tambahan ${idx + 1}`;
                                    const c = ex.querySelector('.keb-extra-content')?.value?.trim() || '';
                                    if (c) {
                                        md += `## ${t}\n${c}\n\n`;
                                    }
                                });

                                rawTextarea.value = md.trim() + "\n";
                            }

                            function syncProfilToRaw() {
                                const rawTextarea = document.getElementById('kb_profil');
                                if (!rawTextarea) return;

                                const brand = document.getElementById('profBrandName')?.value?.trim() || 'Bisnis Klien';
                                const tagline = document.getElementById('profTagline')?.value?.trim() || 'Layanan Profesional dan Terpercaya';
                                const tone = document.getElementById('profTone')?.value || 'Ramah, sopan, informatif, dan solutif.';
                                const greeting = document.getElementById('profGreeting')?.value?.trim() || `Halo! Selamat datang di ${brand}, ada yang bisa kami bantu? 😊`;

                                let md = "# Profil Bisnis\n\n";
                                md += `- **Nama Brand**: ${brand}\n`;
                                md += `- **Tagline**: ${tagline}\n`;
                                md += `- **Sapaan AI**: ${greeting}\n`;
                                md += `- **Gaya Komunikasi**: ${tone}\n`;

                                rawTextarea.value = md;
                            }

                            function syncAllStructuredToRaw() {
                                syncLayananToRaw();
                                syncFaqToRaw();
                                syncKebijakanToRaw();
                                syncProfilToRaw();
                            }

                            // Initial Markdown Parser to Structured Form
                            function initStructuredForms() {
                                // 1. Layanan
                                const rawLayanan = document.getElementById('kb_layanan')?.value || '';
                                const layLines = rawLayanan.split('\n');
                                let foundLayanan = false;
                                for (const line of layLines) {
                                    const m = line.match(/^[-*]\s+\*\*(.*?)\*\*:\s*(.*)$/);
                                    if (m) {
                                        foundLayanan = true;
                                        const name = m[1].trim();
                                        const text = m[2].trim();
                                        let price = '';
                                        let desc = text;
                                        const pMatch = text.match(/(Mulai\s+Rp[\d\.\,]+|Rp[\d\.\,]+[^\.\n]*)/i);
                                        if (pMatch) {
                                            price = pMatch[0].trim();
                                            desc = text.replace(price, '').trim().replace(/^[\.\,\s\-]+|[\.\,\s\-]+$/g, '');
                                        }
                                        addLayananItem(name, price, desc);
                                    }
                                }

                                // 2. FAQ
                                const rawFaq = document.getElementById('kb_faq')?.value || '';
                                const faqMatches = [...rawFaq.matchAll(/###\s*Q:\s*([^\n]+)\s*\n+\s*A:\s*([\s\S]*?)(?=(?:###\s*Q:|$))/g)];
                                if (faqMatches.length > 0) {
                                    faqMatches.forEach(m => {
                                        addFaqItem(m[1].trim(), m[2].trim());
                                    });
                                }

                                // 3. Kebijakan
                                const rawKebijakan = document.getElementById('kb_kebijakan')?.value || '';
                                const sec1 = rawKebijakan.match(/## 1\.[^\n]*\n([\s\S]*?)(?=(?:## 2\.|$))/);
                                const sec2 = rawKebijakan.match(/## 2\.[^\n]*\n([\s\S]*?)(?=(?:## 3\.|$))/);
                                const sec3 = rawKebijakan.match(/## 3\.[^\n]*\n([\s\S]*?)(?=(?:## \d+\.|$))/);
                                if (sec1 && document.getElementById('kbPayment')) document.getElementById('kbPayment').value = sec1[1].trim();
                                if (sec2 && document.getElementById('kbCancel')) document.getElementById('kbCancel').value = sec2[1].trim();
                                if (sec3 && document.getElementById('kbWarranty')) document.getElementById('kbWarranty').value = sec3[1].trim();

                                // 4. Profil
                                const rawProfil = document.getElementById('kb_profil')?.value || '';
                                const getProfVal = (label) => {
                                    const m = rawProfil.match(new RegExp('- \\*\\*' + label + '\\*\\*:\\s*(.*)', 'i'));
                                    return m ? m[1].trim() : '';
                                };
                                const bName = getProfVal('Nama Brand');
                                const tag = getProfVal('Tagline');
                                const sap = getProfVal('Sapaan AI');
                                if (bName && document.getElementById('profBrandName')) document.getElementById('profBrandName').value = bName;
                                if (tag && document.getElementById('profTagline')) document.getElementById('profTagline').value = tag;
                                if (sap && document.getElementById('profGreeting')) document.getElementById('profGreeting').value = sap;
                            }

                            // Initialize on page load
                            document.addEventListener('DOMContentLoaded', function() {
                                initStructuredForms();
                                const knowledgeForm = document.getElementById('orderKnowledgeForm');
                                const editorStatus = document.getElementById('kbEditorStatus');
                                let hasUnsavedChanges = false;

                                const setEditorStatus = function(state, message) {
                                    if (!editorStatus) return;
                                    editorStatus.className = 'kb-editor-status' + (state ? ' is-' + state : '');
                                    editorStatus.textContent = message;
                                };

                                const markKnowledgeDirty = function() {
                                    hasUnsavedChanges = true;
                                    setEditorStatus('dirty', 'Perubahan belum disimpan');
                                };

                                if (knowledgeForm) {
                                    knowledgeForm.addEventListener('input', markKnowledgeDirty);
                                    knowledgeForm.addEventListener('change', markKnowledgeDirty);
                                    knowledgeForm.addEventListener('submit', function() {
                                        syncAllStructuredToRaw();
                                        hasUnsavedChanges = false;
                                        setEditorStatus('saved', 'Menyimpan perubahan…');
                                    });

                                    const editableAreas = [
                                        document.getElementById('layananItemsContainer'),
                                        document.getElementById('faqItemsContainer'),
                                        document.getElementById('kebijakanExtraContainer'),
                                    ].filter(Boolean);
                                    editableAreas.forEach(function(area) {
                                        new MutationObserver(markKnowledgeDirty).observe(area, { childList: true });
                                    });
                                }

                                window.addEventListener('beforeunload', function(event) {
                                    if (!hasUnsavedChanges) return;
                                    event.preventDefault();
                                    event.returnValue = '';
                                });

                                const urlParams = new URLSearchParams(window.location.search);
                                if (urlParams.get('tab') === 'ai-kb') {
                                    switchOrderTab('ai-kb');
                                }
                            });
                        </script>
                    @endif
                @endif
            </div>

            <aside aria-label="Rincian pesanan" class="customer-create-aside">
                <section class="customer-create-card customer-create-summary" id="cardOrderSummary">
                    <h2 id="summary-title">
                        <span aria-hidden="true" class="material-symbols-outlined">receipt_long</span>
                        Ringkasan Pesanan
                    </h2>
                    <div class="customer-create-summary-rows">
                        <div class="customer-create-summary-row">
                            <span>Nomor Pesanan</span>
                            <strong>{{ $order->order_number }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Template</span>
                            <strong @class(['is-unset' => ! $order->template])>{{ $order->template?->name ?? '-' }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Paket</span>
                            <strong>{{ $order->package->name }}</strong>
                        </div>
                        <div class="customer-create-summary-addons">
                            <span>Add-on terpilih:</span>
                            <div class="customer-create-addon-list">
                                @if (collect($order->addon_snapshot)->isEmpty())
                                    <span class="is-unset">Tidak ada add-on</span>
                                @else
                                    @foreach ($order->addon_snapshot as $addon)
                                        <span class="customer-create-addon-row">
                                            <span>{{ $addon['name'] }}</span>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Tanggal Pesanan</span>
                            <strong>{{ $order->created_at->translatedFormat('d M Y') }}</strong>
                        </div>
                        <div class="customer-create-summary-total">
                            <span>Total Tagihan</span>
                            <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>

    @if (in_array($order->status, ['awaiting_payment', 'rejected']))
        <x-customer-modal id="order-pay-modal" title="Pilih metode pembayaran" subtitle="Total pembayaran Rp{{ number_format($order->total_price, 0, ',', '.') }}" icon="tune">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>Midtrans</span><span>Transfer instan</span></div>
                <div class="customer-modal-row"><span>Transfer bank</span><span>Verifikasi manual</span></div>
                <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($order->total_price, 0, ',', '.') }}</span></div>
            </div>
            <form method="POST" action="{{ route('orders.pay', $order) }}">
                @csrf
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Batal</button>
                    <button class="customer-btn customer-btn--primary" type="submit">Lanjutkan pembayaran</button>
                </div>
            </form>
        </x-customer-modal>

        <x-customer-modal id="order-upload-modal" variant="fullscreen" title="Unggah bukti pembayaran" subtitle="Format JPG, PNG, atau PDF. Maksimal 2 MB." icon="upload_file" :open="($errors->has('payment_receipt') || $errors->has('payment_note'))">
            <form method="POST" action="{{ route('orders.receipt', $order) }}" enctype="multipart/form-data" data-upload-modal>
                @csrf
                <div class="customer-modal-upload-state">
                    <div data-upload-pick>
                        <div class="form-field">
                            <label for="payment_receipt">Bukti transfer JPG, PNG, atau PDF (maks. 2 MB)</label>
                            <input id="payment_receipt" name="payment_receipt" type="file" accept=".jpg,.jpeg,.png,.pdf" required data-modal-autofocus>
                            @error('payment_receipt') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-field">
                            <label for="payment_note">Catatan (opsional)</label>
                            <textarea id="payment_note" name="payment_note" rows="3">{{ old('payment_note') }}</textarea>
                            @error('payment_note') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div data-upload-review hidden>
                        <div class="customer-modal-rows">
                            <div class="customer-modal-row"><span>File</span><strong data-upload-name>-</strong></div>
                            <div class="customer-modal-row"><span>Ukuran</span><strong data-upload-size>-</strong></div>
                            <div class="customer-modal-row"><span>Status</span><span>Siap dikirim</span></div>
                        </div>
                    </div>
                    <div class="customer-modal-actions">
                        <button class="customer-btn" type="button" data-modal-close>Batal</button>
                        <label class="customer-btn customer-btn--primary" for="payment_receipt" data-upload-pick>Pilih file</label>
                        <button class="customer-btn" type="button" data-modal-open="#order-remove-modal" data-upload-review-only hidden>Hapus file</button>
                        <label class="customer-btn" for="payment_receipt" data-upload-review-only hidden>Ganti file</label>
                        <button class="customer-btn customer-btn--primary" type="submit" data-upload-review-only hidden>Kirim bukti</button>
                    </div>
                </div>
            </form>
        </x-customer-modal>

        <x-customer-modal id="order-remove-modal" tone="danger" title="Hapus file ini?" subtitle="File akan dilepas dari formulir upload." icon="warning">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>File</span><strong data-upload-name>-</strong></div>
                <div class="customer-modal-row"><span>Ukuran</span><strong data-upload-size>-</strong></div>
                <div class="customer-modal-row"><span>Aksi</span><span>Tidak dapat dibatalkan</span></div>
            </div>
            <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                <button class="customer-btn" type="button" data-modal-close>Kembali</button>
                <button class="customer-btn customer-btn--danger" type="button" data-upload-clear="#order-upload-modal" data-modal-close>Hapus file</button>
            </div>
        </x-customer-modal>

        <x-customer-modal id="order-cancel-modal" tone="danger" title="Batalkan pesanan?" subtitle="Pesanan yang sudah dibayar tidak dapat dibatalkan dari portal." icon="warning">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>Pesanan</span><span>{{ $order->order_number }}</span></div>
                <div class="customer-modal-row"><span>Pembayaran</span><span>Menunggu</span></div>
                <div class="customer-modal-row"><span>Dampak</span><span>Pesanan dibatalkan</span></div>
            </div>
            <form method="POST" action="{{ route('orders.cancel', $order) }}">
                @csrf
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Kembali</button>
                    <button class="customer-btn customer-btn--danger" type="submit">Batalkan pesanan</button>
                </div>
            </form>
        </x-customer-modal>
    @endif

    @if (session('status') === 'Bukti pembayaran berhasil dikirim.')
        <x-customer-modal id="order-receipt-sent-modal" tone="success" open title="Bukti pembayaran terkirim" subtitle="Tim WEBIA akan memverifikasi pembayaran." icon="check_circle">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>Pesanan</span><span>{{ $order->order_number }}</span></div>
                <div class="customer-modal-row"><span>Status</span><span>Menunggu verifikasi</span></div>
                <div class="customer-modal-row"><span>Estimasi</span><span>Maks. 1x24 jam kerja</span></div>
            </div>
            <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                <button class="customer-btn customer-btn--success" type="button" data-modal-close>Tutup</button>
            </div>
        </x-customer-modal>
    @endif
@endsection
