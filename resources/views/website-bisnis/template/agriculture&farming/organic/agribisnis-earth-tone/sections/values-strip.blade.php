<section class="values reveal" id="tentang" aria-label="Komitmen AgroHarvest">
    <img class="values__leaves" src="{{ $img }}/strip-leaves.png" alt="" aria-hidden="true" loading="lazy">
    <img class="values__bee" src="{{ $img }}/strip-bee.png" alt="" aria-hidden="true" loading="lazy">
    <blockquote class="values__quote">
        <p>{{ $data['values']['quote'][0] }}<br>{{ $data['values']['quote'][1] }}</p>
    </blockquote>
    <ul class="values__list">
        @foreach ($data['values']['items'] as $item)
            <li>
                <svg class="ico"><use href="#i-{{ $item['icon'] }}"></use></svg>
                <span>{{ $item['lines'][0] }}<br>{{ $item['lines'][1] }}</span>
            </li>
        @endforeach
    </ul>
</section>
