
@props(['label', 'name'])
@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'rows' => '3',
        'value' => old($name),
        'class' => "block w-full rounded-md bg-white/5 px-3 py-1.5 text-lg text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-orange-500"
    ]
@endphp

<div class="col-span-full">
    <x-forms.title>{{ $slot }}</x-forms.title>
    <div class="mt-2">
        <textarea {{ $attributes($defaults) }}></textarea>
    </div>
</div>