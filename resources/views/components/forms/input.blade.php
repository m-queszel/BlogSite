@props(['name', 'type' => 'text'])
@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'type' => $type,
        'value' => old($name),
        'class' => "block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-lg text-white  focus:outline-none" 
    ]
@endphp

<div class="sm:col-span-4">
    <x-forms.title>{{ $slot  }}</x-forms.title>
    <div class="mt-2">
        <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-orange-500">
            <input {{ $attributes($defaults)  }}/>
        </div>
            @error($name)
                <p class="text-red-500 font-semibold mt-1">{{ $message  }}</p>
            @enderror
    </div>
</div>