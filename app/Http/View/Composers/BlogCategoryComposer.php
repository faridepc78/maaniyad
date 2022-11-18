<?php


namespace App\Http\View\Composers;

use App\Repositories\PostCategoryRepository;
use Illuminate\View\View;

class BlogCategoryComposer
{
    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->postCategoryRepository->getAll()
        ]);
    }
}
