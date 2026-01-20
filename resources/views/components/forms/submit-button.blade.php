@props(['hasCancel' => true, 'isComment' => false, 'post'])
<div class="mt-6 flex items-center justify-end gap-x-6 text-lg">
@if($hasCancel && !$isComment)
    <a href="{{ route('home') }}" class="font-semibold text-white hover:text-orange-500">Cancel</a>
@elseif($hasCancel && $isComment)
    <a href="{{ route('posts.show', $post) }}" class="font-semibold text-white hover:text-orange-500">Cancel</a>
@endif
    <button type="submit" class="cursor-pointer  hover:bg-orange-600  rounded-md bg-orange-500 px-3 py-2 font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500">{{ $slot  }}</button>
</div>