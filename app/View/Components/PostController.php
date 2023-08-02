<?php

namespace App\View\Components;

use Closure;
use Corcel\Model\Post;
use Corcel\Model\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostController extends Component
{
    /**
     * Create a new component instance.
     */
    public $startscreenTop;

    public $posts;

    public function overview()
    {
        $posts = Post::taxonomy('category', 'startseite')->where('post_status','publish')->orderBy('post_date_gmt', 'desc')->paginate(6);;
        $posts->each(function ($post) {
            $this->posts = $post;
            $this->posts->author_name = User::find($post->post_author)->display_name;
        });

        $titlepost = Post::taxonomy('category', 'sticky')->where('post_status','publish')->get();
        $titlepost->each(function ($element) {
            $this->startscreenTop = $element;
            $this->startscreenTop->author_name = User::find($element->post_author)->display_name;
        });
        return view('components.post.post-overview', ['startscreenTop' => $this->startscreenTop, 'posts' => $posts]);
    }

    
    public function post(Post $post){        
        return view('components.post.post-singleview', ['post' => $post]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.post-overview');
    }
}
