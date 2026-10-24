{{-- Dialog video profil. Isi 'video_url' (URL .mp4 atau YouTube) di config company-profile.php. --}}
<dialog class="cp-dialog" data-cp-video-dialog data-src="{{ $company['video_url'] }}" aria-label="Video profil {{ $company['name'] }}">
    <button class="cp-dialog__close" type="button" data-cp-video-close aria-label="Tutup video">{!! $icon('close') !!}</button>
    <div class="cp-dialog__stage" data-cp-video-stage></div>
</dialog>
