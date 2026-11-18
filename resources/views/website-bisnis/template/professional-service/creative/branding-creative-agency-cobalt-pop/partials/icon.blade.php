{{-- Ikon SVG inline. Pemakaian: @include('...partials.icon', ['name' => 'mail']) --}}
@if($name === 'mail')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
@elseif($name === 'phone')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
@elseif($name === 'pin')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 21s7-6.2 7-11a7 7 0 0 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
@elseif($name === 'clock')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
@elseif($name === 'arrow')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M8 7h9v9"/></svg>
@elseif($name === 'arrow-right')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
@elseif($name === 'arrow-left')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
@elseif($name === 'chevron')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg>
@elseif($name === 'close')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 6l12 12M18 6 6 18"/></svg>
@elseif($name === 'send')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 12 20 4l-4 16-4-6z"/><path d="M12 14 20 4"/></svg>
@elseif($name === 'check')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path d="m8 12.5 3 3 5-6"/></svg>
@elseif($name === 'instagram')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r=".9" fill="currentColor" stroke="none"/></svg>
@elseif($name === 'behance')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 6h6a3 3 0 0 1 0 6H3zM3 12h7a3 3 0 0 1 0 6H3zM14 7h7M14.2 14h6.6a3.2 3.2 0 1 0-1 2.4"/></svg>
@elseif($name === 'linkedin')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M8 10.5V17M8 7.2v.1M12 17v-6.5M12 13.5a3 3 0 0 1 6 0V17"/></svg>
@elseif($name === 'tiktok')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M14 4v10.5a3.5 3.5 0 1 1-3.5-3.5M14 4c.3 2.5 2 4 4.5 4.2"/></svg>
@elseif($name === 'whatsapp')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3.6 20.4 5 15.7A8.6 8.6 0 1 1 8.4 19z"/><path d="M9.1 7.6c-.4 2.9 3.2 6.5 6.7 6.7l1.1-1.4-2.3-1.2-.9.8a4.8 4.8 0 0 1-2.2-2.2l.8-.9-1.2-2.3z" fill="currentColor" stroke="none"/></svg>
@elseif($name === 'spark')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 2c.8 5.6 2.6 8.2 10 10-7.4 1.8-9.2 4.4-10 10-.8-5.6-2.6-8.2-10-10 7.4-1.8 9.2-4.4 10-10z" fill="currentColor" stroke="none"/><circle cx="19.5" cy="4.5" r="2" fill="#FF5C47" stroke="none"/></svg>
@elseif($name === 'strategy')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2" fill="currentColor"/><path d="m12 12 8-8M16.5 4H20v3.5"/></svg>
@elseif($name === 'identity')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="9" cy="12" r="6"/><circle cx="15" cy="12" r="6"/></svg>
@elseif($name === 'graphic')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3.5 20 9 6l5.5 14z"/><circle cx="18" cy="7" r="3"/><rect x="15" y="14" width="6" height="6"/></svg>
@elseif($name === 'marketing')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 10v4h3l8 4V6L7 10z"/><path d="M18 9a4 4 0 0 1 0 6"/></svg>
@elseif($name === 'web')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 9h18M7 7h.01M10 7h.01"/></svg>
@elseif($name === 'content')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m10 9 5 3-5 3z" fill="currentColor"/></svg>
@elseif($name === 'campaign')
<svg class="bca-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.6 5.6l2.8 2.8M15.6 15.6l2.8 2.8M18.4 5.6l-2.8 2.8M8.4 15.6l-2.8 2.8"/><circle cx="12" cy="12" r="2"/></svg>
@endif
