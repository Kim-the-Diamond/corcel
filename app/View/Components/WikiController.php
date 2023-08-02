<?php

namespace App\View\Components;

use Corcel\Model\Post;
use Illuminate\Contracts\View\View;
use Closure;
use Illuminate\View\Component;



class WikiController extends Component
{
    private $acfData = array(array());
    private $acfValue = array(array());

        public function overview(){
            $post = Post::where('post_type','wiki')
            ->where('post_status','publish')
            ->orderBy('post_date_gmt', 'desc')
            ->paginate(15);

            return view('components.wiki.wiki-overview',['posts'=>$post]);
        }

    public function wiki(Post $post){
        $meta = array('meta' => $post->post_name);
        foreach ($post->meta as $p) {
            if(str_contains($p->meta_key,'downloads') && !(str_contains($p->meta_value,'field'))){
                $string = explode("_",$p->meta_key);
                if(str_contains($p->meta_key,'rubrik-titel')){
                    $meta['title'] = $p->meta_value;
                    $meta['type'] = 'downloads';
                    $this->acfData['meta_data'] = $meta;
                }

                if(count($string)>3){
                    if(str_contains($string[4],'datei')){
                        $this->sortIn($string, Post::find($p->meta_value));
                    }elseif(str_contains($string[4],'gultig')){
                        $year = substr($p->meta_value,0,-4);
                        $month = substr($p->meta_value,4,-2);
                        $day = substr($p->meta_value,6);
                        $this->sortIn($string,"{$day}.{$month}.{$year}");
                    }
                    else{
                        $this->sortIn($string, $p->meta_value);
                    }
                }
                }
            }

            $this->acfData = (object)$this->acfData;
            $this->acfValue = (object)$this->acfValue;

            return view('components.wiki.wiki-singleview',['wikiMeta'=>$this->acfData, 'wikiValues'=>$this->acfValue, 'post'=>$post]);
        }

    private function sortIn($string, $el){
        $this->acfValue[$string[3]][] = array($string[4]=>$el);
    }

    public function render(): View|Closure|string
    {
        return view('components.wiki.wiki-overview');
    }
}
