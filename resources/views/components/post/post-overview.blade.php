
<x-layouts.basic>
    <x-slot:name>Startseite</x-slot:name>

    
    <div class="grid grid-cols-2">
        <div>
            <div class="flex gap-2 mx-10">
                <img loading="lazy" class="w-60 h-30" src={{ $startscreenTop->thumbnail }} alt="">
                <div class="">
                    <h3 class="text-blue-600"><a href='/posts/{{ $startscreenTop->post_name }}'>
                        {{ $startscreenTop->post_title }}</a></h3>
                        {{ $startscreenTop->author_name }}<br>
                        {{ $startscreenTop->post_date->format('j F, Y') }}
                    </div>
                </div>
                
                @if ($posts != null)
                @foreach ($posts as $post)
                <div class="flex gap-2 mx-10  my-3">
                    @if ($post->thumbnail)
                    <img loading="lazy" class="w-60 h-30" src={{ $post->thumbnail }} alt="">
                    @endif
                    <div class="">
                        <h3 class="text-blue-600"><a href='/posts/{{ $post->post_name }}'>{{ $post->post_title }}</a></h3>
                        {{ $post->author_name }}<br>
                        {{ $post->post_date->format('j F, Y') }}
                        <br>
                        {{ $post->post_excerpt}}
                        {{ $post->ping_status}}
                        
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <iframe class="mr-10 justify-self-end" src="https://time.heco.si" height="1500">
                </iframe>
            </div>
            
        </x-layouts.basic>