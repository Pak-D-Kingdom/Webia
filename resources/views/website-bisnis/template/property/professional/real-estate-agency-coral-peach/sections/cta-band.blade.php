{{-- Pita ajakan (dipakai di halaman dalam). Variabel opsional: $ctaTitle, $ctaText. --}}
@php $c = $site['contact']; @endphp
<section class="cta-band">
  <div class="container cta-band__inner">
    <div>
      <h2>{{ $ctaTitle ?? 'Siap menemukan hunian impian Anda?' }}</h2>
      <p>{{ $ctaText ?? 'Jadwalkan kunjungan atau konsultasi gratis bersama tim kami hari ini.' }}</p>
    </div>
    <div class="cta-band__actions">
      <a class="btn btn--light" href="{{ route('coral-peach.booking') }}">Jadwalkan Viewing</a>
      <a class="btn btn--outline-light" href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode($c['whatsapp_text']) }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
    </div>
  </div>
</section>
