@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $d = $f['dimensions'];
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-dims" data-tabs>
            <div class="lf-dims__side">
                <figure class="lf-dims__fig"><img src="{{ $a($d['image']) }}" alt="Sketsa ukuran kursi dengan garis dimensi" loading="lazy"></figure>
                <p class="lf-note">{{ $d['note'] }}</p>
                <a class="lf-btn lf-btn--brown lf-btn--sm" href="{{ $r('order') }}">Pesan Ukuran Custom <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>

            <div class="lf-dims__main">
                <div class="lf-tabs" role="tablist" aria-label="Kategori produk">
                    @foreach ($d['tabs'] as $key => $tab)
                        <button type="button" role="tab" id="tab-{{ $key }}" aria-controls="panel-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-tab="{{ $key }}" tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $tab['label'] }}</button>
                    @endforeach
                </div>

                @foreach ($d['tabs'] as $key => $tab)
                    @php $max = max(array_map(fn ($row) => max($row[1], $row[2], $row[3]), $tab['rows'])); @endphp
                    <div class="lf-tabpanel" role="tabpanel" id="panel-{{ $key }}" aria-labelledby="tab-{{ $key }}" data-panel="{{ $key }}" @unless ($loop->first) hidden @endunless>
                        <div class="lf-table-wrap">
                            <table class="lf-table">
                                <caption class="lf-sr">Ukuran standar {{ $tab['label'] }} dalam sentimeter</caption>
                                <thead>
                                    <tr><th scope="col">Produk</th><th scope="col">Panjang</th><th scope="col">Lebar</th><th scope="col">Tinggi</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($tab['rows'] as $row)
                                        <tr>
                                            <th scope="row">{{ $row[0] }}</th>
                                            <td data-label="Panjang">{{ $row[1] }} cm<i style="--w: {{ round($row[1] / $max * 100) }}%"></i></td>
                                            <td data-label="Lebar">{{ $row[2] }} cm<i style="--w: {{ round($row[2] / $max * 100) }}%"></i></td>
                                            <td data-label="Tinggi">{{ $row[3] }} cm<i style="--w: {{ round($row[3] / $max * 100) }}%"></i></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
