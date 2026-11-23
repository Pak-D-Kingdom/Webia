@extends($hv.'layouts.app')
@section('title', 'Home')
@section('content')

{{-- C. Hero --}}
<section class="hda-hero" aria-labelledby="hda-h1">
    <div class="hda-hero__bg" data-parallax style="background-image:url('{{ $ha('hero-library.webp') }}')"></div>
    <div class="hda-hero__shade"></div>
    <div class="hda-hero__dust" data-dust aria-hidden="true"></div>
    <div class="hda-container hda-hero__in">
        <div class="hda-hero__copy">
            <h1 id="hda-h1">Preserving History,<br>Protecting <em>Our Heritage</em></h1>
            <p>{{ $hda['hero']['text'] }}</p>
            <div class="hda-hero__cta">
                <a class="hda-btn hda-btn--primary" href="{{ $hu('collections') }}"><svg class="hda-icon"><use href="#i-book"/></svg>Explore Historical Collections <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
                <a class="hda-btn hda-btn--ghost" href="{{ $hu('about') }}"><svg class="hda-icon"><use href="#i-play"/></svg>Discover Our Archive</a>
            </div>
        </div>
    </div>
</section>

{{-- D. Search the Archive --}}
<section class="hda-search" aria-labelledby="hda-search-h">
    <img class="hda-search__sk hda-search__sk--l" src="{{ $ha('ui/sketch-cathedral.svg') }}" alt="" aria-hidden="true">
    <img class="hda-search__sk hda-search__sk--r" src="{{ $ha('ui/sketch-map.svg') }}" alt="" aria-hidden="true">
    <div class="hda-container">
        <div class="hda-search__card hda-reveal">
            <span class="hda-scroll hda-scroll--l" aria-hidden="true"></span><span class="hda-scroll hda-scroll--r" aria-hidden="true"></span>
            <h2 id="hda-search-h" class="hda-orn-title"><span class="hda-orn-title__t">Search the Archive</span></h2>
            <p>Find historical documents, collections, and more</p>
            <form action="{{ $hu('search') }}" method="get" role="search" data-search-form>
                <div class="hda-search__row">
                    <input type="search" name="q" placeholder="Search by keyword, title, or author…" aria-label="Search by keyword, title, or author" autocomplete="off" data-suggest-input>
                    <button class="hda-search__go" type="submit" aria-label="Search"><svg class="hda-icon"><use href="#i-search"/></svg></button>
                    <div class="hda-suggest" data-suggest role="listbox"></div>
                </div>
                <div class="hda-filters">
                    <label class="hda-select"><span class="hda-sr">Period</span><svg class="hda-icon"><use href="#i-calendar"/></svg>
                        <select name="period"><option value="">Any Period</option>@foreach($hda['filters']['periods'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
                    <label class="hda-select"><span class="hda-sr">Category</span><svg class="hda-icon"><use href="#i-tag"/></svg>
                        <select name="category"><option value="">Any Category</option>@foreach($hda['filters']['categories'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
                    <label class="hda-select"><span class="hda-sr">Location</span><svg class="hda-icon"><use href="#i-pin"/></svg>
                        <select name="location"><option value="">Any Location</option>@foreach($hda['filters']['locations'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
                    <label class="hda-select"><span class="hda-sr">Document type</span><svg class="hda-icon"><use href="#i-file"/></svg>
                        <select name="type"><option value="">Any Type</option>@foreach($hda['filters']['types'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
                    <a class="hda-advlink" href="{{ $hu('advanced') }}"><svg class="hda-icon" style="width:14px;height:14px"><use href="#i-filter"/></svg>Advanced Search</a>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- E. Browse Historical Archives --}}
<section class="hda-section hda-cats" aria-labelledby="hda-cats-h">
    <div class="hda-container">
        <div class="hda-title hda-reveal">
            <h2 id="hda-cats-h" class="hda-orn-title"><span class="hda-orn-title__t">Browse Historical Archives</span></h2>
            <p>Explore our extensive collection of historical resources</p>
        </div>
        <div class="hda-cats__wrap">
            <img class="hda-flourish" src="{{ $ha('ui/flourish.svg') }}" alt="" aria-hidden="true">
            <div class="hda-cats__grid">
                @foreach($hda['categories'] as $cat)
                <a class="hda-cat hda-reveal" style="--i:{{ $loop->index }}" href="{{ $hu('category', $cat['slug']) }}">
                    <span class="hda-cat__img"><img src="{{ $ha($cat['image']) }}" alt="" loading="lazy" width="320" height="240"></span>
                    <h3>{{ $cat['title'] }}</h3>
                </a>
                @endforeach
            </div>
            <img class="hda-flourish hda-flourish--r" src="{{ $ha('ui/flourish.svg') }}" alt="" aria-hidden="true">
        </div>
    </div>
</section>

{{-- F + G. Featured Collections & Documents --}}
<section class="hda-feat" aria-label="Featured collections and documents">
    <div class="hda-container hda-feat__grid">
        <div class="hda-fpanel hda-reveal" data-slider>
            <div class="hda-fpanel__head"><span class="hda-fpanel__title"><svg class="hda-icon"><use href="#i-layers"/></svg>Featured Collections</span><a class="hda-fpanel__all" href="{{ $hu('collections') }}">View All Collections <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
            <div class="hda-fpanel__body">
                <div class="hda-slider__viewport">
                    <div class="hda-slider__track" data-track>
                        @foreach($hda['collections'] as $col)
                        @if($loop->index < 4)
                        <div class="hda-slide">
                            <article class="hda-feature">
                                <div class="hda-feature__img"><img src="{{ $ha($col['image']) }}" alt="" loading="lazy"></div>
                                <div class="hda-feature__body">
                                    <h3>{{ $col['title'] }} <span>({{ $col['period'] }})</span></h3>
                                    <p>{{ $col['desc'] }}</p>
                                    <div class="hda-meta"><span><svg class="hda-icon"><use href="#i-file"/></svg>{{ $col['docs'] }} Docs</span><span><svg class="hda-icon"><use href="#i-layers"/></svg>{{ $col['subs'] }} Collections</span></div>
                                    <a class="hda-btn hda-btn--primary hda-btn--sm" style="align-self:flex-start" href="{{ $hu('collection', $col['slug']) }}">View Collection <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
                                </div>
                            </article>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="hda-slider__ctrl">
                    <button type="button" class="hda-arrow-btn" data-prev aria-label="Previous collection"><svg class="hda-icon"><use href="#i-left"/></svg></button>
                    <button type="button" class="hda-arrow-btn" data-next aria-label="Next collection"><svg class="hda-icon"><use href="#i-right"/></svg></button>
                    <div class="hda-dots" data-dots></div>
                </div>
            </div>
        </div>
        <div class="hda-fpanel hda-reveal" style="--i:1" data-slider>
            <div class="hda-fpanel__head"><span class="hda-fpanel__title"><svg class="hda-icon"><use href="#i-file"/></svg>Featured Documents</span><a class="hda-fpanel__all" href="{{ $hu('documents') }}">View All Documents <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
            <div class="hda-fpanel__body">
                <div class="hda-slider__viewport">
                    <div class="hda-slider__track" data-track>
                        @foreach($hda['documents'] as $d)
                        @if($loop->index < 4)
                        <div class="hda-slide">
                            <article class="hda-feature">
                                <div class="hda-feature__img hda-feature__img--doc"><img src="{{ $ha($d['image']) }}" alt="" loading="lazy"></div>
                                <div class="hda-feature__body">
                                    <h3>{{ $d['title'] }} <span>({{ $d['year'] }})</span></h3>
                                    <p>{{ $d['desc'] }}</p>
                                    <div class="hda-meta hda-meta--col"><span><svg class="hda-icon"><use href="#i-file"/></svg>Document Type: {{ $d['type'] }}</span><span><svg class="hda-icon"><use href="#i-tag"/></svg>Ref. No: {{ $d['ref'] }}</span></div>
                                    <a class="hda-btn hda-btn--primary hda-btn--sm" style="align-self:flex-start" href="{{ $hu('document', $d['slug']) }}">View Original Document <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
                                </div>
                            </article>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="hda-slider__ctrl">
                    <button type="button" class="hda-arrow-btn" data-prev aria-label="Previous document"><svg class="hda-icon"><use href="#i-left"/></svg></button>
                    <button type="button" class="hda-arrow-btn" data-next aria-label="Next document"><svg class="hda-icon"><use href="#i-right"/></svg></button>
                    <div class="hda-dots" data-dots></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- H. Historical Timeline --}}
<section class="hda-timeline" aria-labelledby="hda-tl-h" data-timeline>
    <div class="hda-container">
        <div class="hda-title hda-reveal">
            <h2 id="hda-tl-h" class="hda-orn-title"><span class="hda-orn-title__t">Historical Timeline</span></h2>
            <p>Journey through the key moments in history</p>
        </div>
        <div class="hda-tl">
            <button type="button" class="hda-tl__side hda-tl__side--l" data-tl-prev aria-label="Previous era"><svg class="hda-icon"><use href="#i-left"/></svg></button>
            <div class="hda-tl__track" role="tablist" aria-label="Historical eras">
                @foreach($hda['periods'] as $pd)
                <div class="hda-tl__item {{ $loop->index == 2 ? 'is-active' : '' }} hda-reveal" style="--i:{{ $loop->index }}" data-tl-item data-desc="{{ $pd['desc'] }}" data-href="{{ $hu('period', $pd['slug']) }}">
                    <div class="hda-tl__art"><img src="{{ $ha($pd['image']) }}" alt="" loading="lazy" width="600" height="260"></div>
                    <div class="hda-tl__node"><span class="hda-tl__dot"></span></div>
                    <button type="button" class="hda-tl__btn" role="tab" aria-selected="{{ $loop->index == 2 ? 'true' : 'false' }}"><strong>{{ $pd['title'] }}</strong><span>({{ $pd['range'] }})</span></button>
                </div>
                @endforeach
            </div>
            <button type="button" class="hda-tl__side hda-tl__side--r" data-tl-next aria-label="Next era"><svg class="hda-icon"><use href="#i-right"/></svg></button>
            <p class="hda-tl__desc" data-tl-desc aria-live="polite"></p>
            <div class="hda-tl__nav">
                <button type="button" class="hda-arrow-btn" data-tl-prev aria-label="Previous era"><svg class="hda-icon"><use href="#i-left"/></svg></button>
                <a class="hda-btn hda-btn--outline" href="{{ $hu('timeline') }}">Explore Full Timeline <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
                <button type="button" class="hda-arrow-btn" data-tl-next aria-label="Next era"><svg class="hda-icon"><use href="#i-right"/></svg></button>
            </div>
        </div>
    </div>
</section>

{{-- I + J. About & Statistics --}}
<section class="hda-about" aria-labelledby="hda-about-h">
    <div class="hda-container hda-about__grid">
        <figure class="hda-photo hda-reveal" style="margin:0">
            <img src="{{ $ha('about-library.webp') }}" alt="A grand reading room lined with bookshelves" loading="lazy" width="1200" height="900">
        </figure>
        <div class="hda-about__copy hda-reveal" style="--i:1">
            <h2 id="hda-about-h">{{ $hda['about']['title'] }}</h2>
            <p>{{ $hda['about']['text'] }}</p>
            <ul class="hda-list" style="margin-bottom:18px">@foreach($hda['about']['mission'] as $m)<li>{{ $m }}</li>@endforeach</ul>
            <a class="hda-btn hda-btn--primary hda-btn--sm" href="{{ $hu('about') }}">Learn More About Us <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
        </div>
        <div class="hda-stats hda-reveal" style="--i:2" data-stats>
            @foreach($hda['stats'] as $st)
            <div class="hda-stat">
                <svg class="hda-icon"><use href="{{ $loop->index == 0 ? '#i-file' : ($loop->index == 1 ? '#i-book' : ($loop->index == 2 ? '#i-globe' : '#i-hourglass')) }}"/></svg>
                <strong data-count="{{ $st['value'] }}">{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- K + L. Latest News & Archive Assistant --}}
<section class="hda-newsrow" aria-labelledby="hda-news-h">
    <div class="hda-container hda-newsrow__grid">
        <div>
            <div class="hda-newshead">
                <div><h2 id="hda-news-h">Latest News &amp; Updates</h2><p>Stay informed about our latest collections, events, and discoveries.</p></div>
                <a class="hda-textlink" href="{{ $hu('news') }}">View All News →</a>
            </div>
            <div class="hda-newsgrid">
                @foreach($hda['news'] as $nw)
                @if($loop->index < 3)
                @include($hv.'partials.card-news')
                @endif
                @endforeach
            </div>
        </div>
        <aside class="hda-assist hda-reveal" aria-labelledby="hda-assist-h">
            <span class="hda-scroll hda-scroll--l" aria-hidden="true"></span><span class="hda-scroll hda-scroll--r" aria-hidden="true"></span>
            <div class="hda-assist__in">
                <div class="hda-assist__copy">
                    <h2 id="hda-assist-h">Archive Assistant</h2>
                    <p>Need help finding historical documents? Our Archive Assistant is here to help!</p>
                    <div class="hda-chips" aria-label="Help topics">
                        @foreach($hda['assistant']['sectionChips'] as $g)
                        <button type="button" class="hda-chip" data-group="{{ $g }}">{{ $g }}</button>
                        @endforeach
                    </div>
                    <button type="button" class="hda-btn hda-btn--primary hda-btn--sm" data-open-chat>Chat with Archive Assistant <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></button>
                </div>
                <div class="hda-assist__mascot"><img src="{{ $ha('ui/mascot-archie.svg') }}" alt="Archie, the Archive Assistant owl" loading="lazy" width="200" height="216"></div>
            </div>
            <div class="hda-assist__sugg" aria-label="Suggested questions">
                @foreach($hda['assistant']['suggestions'] as $q)
                @if($loop->index < 3)
                <button type="button" class="hda-sugg" data-ask="{{ $q }}">{{ $q }}</button>
                @endif
                @endforeach
            </div>
        </aside>
    </div>
</section>

{{-- M. Newsletter --}}
<section class="hda-nlband" aria-labelledby="hda-nl-h">
    <div class="hda-container hda-nlband__in">
        <div class="hda-nlband__t">
            <span class="hda-nlband__ic"><svg class="hda-icon"><use href="#i-mail"/></svg></span>
            <div><h2 id="hda-nl-h">{{ $hda['newsletter']['title'] }}</h2><p>{{ $hda['newsletter']['text'] }}</p></div>
        </div>
        <div class="hda-nlband__f">
            <form class="hda-news__form" data-newsletter novalidate>
                <input type="email" required placeholder="Enter your email address…" aria-label="Email address">
                <button class="hda-btn hda-btn--primary hda-btn--sm" type="submit">Subscribe <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></button>
            </form>
            <p class="hda-news__ok" data-newsletter-ok role="status">Thank you! This is a demo form — connect it to your mailing service.</p>
        </div>
        <img class="hda-nlband__decor" src="{{ $ha('ui/newsletter-decor.svg') }}" alt="" aria-hidden="true" width="420" height="200">
    </div>
</section>
@endsection
