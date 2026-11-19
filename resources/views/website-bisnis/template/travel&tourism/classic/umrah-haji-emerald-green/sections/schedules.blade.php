<section class="uh-card uh-sc" aria-labelledby="uh-sc-title">
    <header class="uh-card__head">
        <h2 id="uh-sc-title" class="uh-card__title">{{ $uh['pages']['schedules']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('schedules') }}"><span>Lihat Semua Jadwal</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['pages']['schedules']['text'] }}</p>
    </header>

    <div class="uh-table-wrap">
        <table class="uh-table uh-table--mini">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach (array_slice($uh['schedules'], 0, 4) as $row)
                    <tr>
                        <td>{{ $row['date'] }}</td>
                        <td>{{ $row['package'] }}</td>
                        <td>{{ $row['duration'] }}</td>
                        <td><span class="uh-status uh-status--{{ $row['tone'] }}">{{ $row['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
