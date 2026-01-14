@props(['id'])

<div class="flex items-center gap-x-3">
    <input id="{{ $id  }}" type="radio" name="push-notifications" checked class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-orange-500 checked:bg-orange-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500 disabled:border-white/5 disabled:bg-white/10 disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" />
    <label for="{{ $id  }}" class="block text-lg text-white">{{ $slot  }}</label>
</div>