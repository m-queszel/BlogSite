@props(['href'])
@php
    $defaults = [
        'href' => $href,
        'class' => "hover:text-orange-500 text-2xl",
    ];
@endphp 
<a {{ $attributes->merge($defaults)  }}> {{ $slot  }}</a>