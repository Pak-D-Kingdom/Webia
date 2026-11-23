<a class="hda-newscard hda-reveal" style="--i:{{ $loop->index }}" href="{{ $hu('news-item', $nw['slug']) }}">
    <span class="hda-newscard__img"><img src="{{ $ha($nw['image']) }}" alt="" loading="lazy"></span>
    <span class="hda-newscard__body"><h3>{{ $nw['title'] }}</h3><time><svg class="hda-icon" style="width:13px;height:13px"><use href="#i-calendar"/></svg> {{ $nw['date'] }}</time></span>
</a>
