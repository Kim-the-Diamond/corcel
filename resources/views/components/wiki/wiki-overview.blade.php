<x-layouts.basic>
    <x-slot:name>Wiki</x-slot:name>
    @if ($posts != null)
    @foreach ($posts as $post)
    <div class="flex gap-2 mx-10 ">
        @if ($post->thumbnail)
        <img loading="lazy" class="w-60 h-30" src={{ $post->thumbnail }} alt="">
        @else
        <img src="https://heco.in/wp-content/uploads/2021/09/Kugel.webp" alt="Wikikugel">
        @endif
        <div class="">
            <h3 class="text-blue-600"><a href='/wiki/{{ $post->post_name }}'>{{ $post->post_title }}</a></h3>
            {{ $post->author_name }}<br>
            {{ $post->post_date->format('j F, Y') }}
            <br>
            
        </div>
    </div>
    @endforeach
    @endif
</x-layouts.basic>