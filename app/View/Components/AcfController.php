<?php

namespace App\View\Components;

use App\Post;
use Tbruckmaier\Corcelacf\AcfTrait;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;



class AcfController extends Component
{
    use AcfTrait;

    public function overview()
    {
        Post::boot();
        $post = Post::find(2609);
    }

    public function render(): View|Closure|string
    {
        return view('components.acf.acf-overview');
    }

}
