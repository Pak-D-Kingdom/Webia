{{-- Satu item akordeon FAQ --}}
<div class="rg-acc__item" @if (! empty($filter)) data-cat="{{ \Illuminate\Support\Str::slug($f['cat']) }}" data-text="{{ strtolower($f['q'] . ' ' . $f['a']) }}" @endif>
    <h3>
        <button class="rg-acc__btn" type="button" aria-expanded="false" aria-controls="rgAcc-{{ $n }}" id="rgAccBtn-{{ $n }}">
            <span>{{ $f['q'] }}</span><i class="bi bi-plus-lg" aria-hidden="true"></i>
        </button>
    </h3>
    <div class="rg-acc__panel" id="rgAcc-{{ $n }}" role="region" aria-labelledby="rgAccBtn-{{ $n }}" hidden>
        <p>{{ $f['a'] }}</p>
    </div>
</div>
