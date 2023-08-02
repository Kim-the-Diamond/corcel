<x-layouts.basic>
    <x-slot:name>Wiki</x-slot:name>

    <div class="grid grid-cols-2">
        <div>
            
            
            <div>
                <img class="w-28 h-20 " src="{{$post->thumbnail}}" alt="">
                {{print_r($post->content)}}
            </div>
            @if(isset($wikiMeta->meta_data))
            <table class="flex">
                <h1 class="text-2xl font-semibold">{{$wikiMeta->meta_data['title']}}</h1>
                
                <tr>
                    <th >Bezeichnung</th>
                    <th>Dokument</th>
                </tr>
                    @foreach ($wikiValues as $item)
                       <tr>
                        @foreach($item as $content)
                            @foreach($content as $values)
                            <td>
                            @if($values instanceof Corcel\Model\Post)
                            <a class="text-blue-900" href="{{$values->url}}">{{$values->post_title}}</a></td>
                            @else
                            {{$values}}
                            @endif
                            </td>
                            @endforeach
                        @endforeach
                        <tr>
                    @endforeach
                    
            </table>
            @endif
        </div>

        <div>
        </div>
    </div>
</x-layouts.basic>