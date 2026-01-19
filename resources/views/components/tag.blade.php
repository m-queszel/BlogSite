@props(['tag'])
<a href="/tags/{{ strtolower($tag->name)}}" class="text-xs hover:text-orange-500 border rounded-xl mx-auto px-3 py-1"}}> {{ $tag->name  }}</a>