@props(['post'])
<div class="mt-6 flex items-center justify-end gap-x-6 text-lg">
    <a href="{{ route('comment.create', ['post' => $post])  }}" class="cursor-pointer  hover:bg-orange-600  rounded-md bg-orange-500 px-5 py-1 font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500">{{ $slot  }}</a>
</div>