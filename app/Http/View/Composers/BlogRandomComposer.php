<?php


namespace App\Http\View\Composers;

use App\Repositories\PostRepository;
use Illuminate\View\View;

class BlogRandomComposer
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function compose(View $view)
    {
        $view->with([
            'random_posts' => $this->postRepository->random()
        ]);
    }
}
