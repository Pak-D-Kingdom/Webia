@extends($v.'layout')
@section('content')
<section class="ph"><div class="w">
<a class="crumb" href="{{ $base }}">Beranda</a>
<h1>{{ $d['pages'][$page]['t'] }}</h1>
<p>{{ $d['pages'][$page]['s'] }}</p>
</div></section>
@include($inc, ['full' => 1])
@endsection
