<section class="card card--bot b-chat" aria-labelledby="pv-chat">
    <p class="bubble" id="pv-chat">Halo! Aku {{ $c['chatbot']['name'] }}<br>si asisten laundry kamu!</p>
    <img class="card--bot__img" src="{{ $img('robot.svg') }}" alt="{{ $c['chatbot']['name'] }}, robot asisten laundry" loading="lazy">
    <div class="card--bot__txt">
        <p>Tanya aku tentang:</p>
        <ul>@foreach ($c['chatbot']['topics'] as $t)<li>{{ $t }}</li>@endforeach</ul>
        <button type="button" class="btn btn--navy btn--sm" data-bot-open>Chat Sekarang <svg class="ic"><use href="#i-arrow"/></svg></button>
    </div>
</section>
