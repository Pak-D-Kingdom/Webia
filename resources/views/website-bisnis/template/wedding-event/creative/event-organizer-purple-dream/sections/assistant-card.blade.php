<aside class="eo-ai-card" aria-label="{{ $eo['assistant']['name'] }}">
    <img class="eo-ai-card__bot" src="{{ asset($eo['assets']['img']) }}/robot.svg" alt="Maskot AI Assistant {{ $eo['brand']['name'] }}" width="130" height="150">
    <div class="eo-ai-card__head">
        <svg class="eo-i" aria-hidden="true"><use href="#i-spark"/></svg>
        <strong>{{ $eo['assistant']['name'] }}</strong>
        <span class="eo-ai-card__status"><i aria-hidden="true"></i>Online</span>
    </div>
    <p class="eo-ai-card__hello">{!! $eo['assistant']['card_text'] !!}</p>
    <ul class="eo-ai-card__list">
        @foreach($eo['assistant']['quick'] as $quick)
        <li>
            <button type="button" data-eo-ask="{{ $quick['ask'] }}">
                <span class="eo-ai-card__ico"><svg class="eo-i" aria-hidden="true"><use href="#{{ $quick['icon'] }}"/></svg></span>
                <span class="eo-ai-card__q">{{ $quick['q'] }}</span>
                <svg class="eo-i eo-ai-card__go" aria-hidden="true"><use href="#i-chev-right"/></svg>
            </button>
        </li>
        @endforeach
    </ul>
    <button class="eo-btn eo-btn--violet eo-btn--block" type="button" data-eo-chat-open>Chat Sekarang <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
</aside>
