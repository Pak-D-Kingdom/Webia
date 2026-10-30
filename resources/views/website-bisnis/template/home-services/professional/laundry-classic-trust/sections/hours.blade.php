<section class="sec">
    <div class="lw-wrap hrp">
        <div class="card card--pad hrp__main">
            <span class="round round--lg"><svg class="ic"><use href="#i-clock"/></svg></span>
            <p class="hrs__day">Setiap hari</p>
            <p class="hrs__time">{{ $c['hours']['open'] }} - {{ $c['hours']['close'] }}</p>
            <p class="hrs__note">{{ $c['hours']['note'] }}</p>
            <p class="status" data-open-status><span class="status__dot"></span><span data-open-text>Memeriksa...</span></p>
            <a class="btn btn--navy btn--sm" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
        <div class="card card--pad">
            <h2>Jadwal Mingguan</h2>
            <table class="ptable ptable--days">
                <tbody>
                    @foreach ($c['hours']['days'] as $d)
                        <tr data-dow="{{ $d['dow'] }}"><td>{{ $d['day'] }}</td><td class="r"><b>{{ $c['hours']['open'] }} - {{ $c['hours']['close'] }}</b></td></tr>
                    @endforeach
                </tbody>
            </table>
            <p class="note"><svg class="ic"><use href="#i-clock"/></svg>Jam operasional mengikuti zona waktu WIB. Pesanan di luar jam buka akan diproses keesokan harinya.</p>
        </div>
    </div>
</section>
