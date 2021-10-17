<?php


namespace App\Http\View\Composers;

use App\Repositories\AlbumRepository;
use Illuminate\View\View;

class AlbumComposer
{
    private $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function compose(View $view)
    {
        $view->with([
            'albums' => $this->albumRepository->getParents()
        ]);
    }
}
