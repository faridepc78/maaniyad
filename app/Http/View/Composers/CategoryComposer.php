<?php


namespace App\Http\View\Composers;

use App\Repositories\ProjectCategoryRepository;
use Illuminate\View\View;

class CategoryComposer
{
    private $projectCategoryRepository;

    public function __construct(ProjectCategoryRepository $projectCategoryRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->projectCategoryRepository->getAll()
        ]);
    }
}
