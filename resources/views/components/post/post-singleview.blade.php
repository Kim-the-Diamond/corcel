<x-layouts.basic>
    <x-slot:name>Startseite</x-slot:name>

    <div class="grid grid-cols-2">
        <div>
            {{!! $post->content !!}}
        </div>
        <iframe class="mr-10 justify-self-end" src="https://time.heco.si" height="1500">
        </iframe>
    </div>
</x-layouts.basic>