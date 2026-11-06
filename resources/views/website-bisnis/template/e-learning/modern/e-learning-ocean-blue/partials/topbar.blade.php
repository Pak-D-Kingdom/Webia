<div class="el-topbar">
    <div class="el-container el-topbar__inner">
        <ul class="el-topbar__info">
            <li><svg class="el-ico" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $e['contact']['address'] }}</span></li>
            <li><svg class="el-ico" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $e['contact']['email'] }}">{{ $e['contact']['email'] }}</a></li>
            <li class="el-topbar__hours"><svg class="el-ico" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $e['contact']['hours'] }}</span></li>
        </ul>
        <div class="el-topbar__right">
            <ul class="el-social" aria-label="Media sosial">
                @foreach ($e['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><svg class="el-ico" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <a class="el-topbar__phone" href="tel:{{ preg_replace('/[^+\d]/', '', $e['contact']['phone']) }}">
                <svg class="el-ico" aria-hidden="true"><use href="#i-phone"/></svg><span>{{ $e['contact']['phone'] }}</span>
            </a>
        </div>
    </div>
</div>
