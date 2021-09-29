<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SliderRepository;
use App\Repositories\TeamRepository;

class MainController extends Controller
{
    private $sliderRepository;
    private $brandRepository;
    private $feedbackRepository;
    private $teamRepository;
    private $projectRepository;
    private $postRepository;
    private $serviceRepository;

    public function __construct(SliderRepository   $sliderRepository,
                                BrandRepository    $brandRepository,
                                FeedbackRepository $feedbackRepository,
                                TeamRepository     $teamRepository,
                                ProjectRepository  $projectRepository,
                                PostRepository     $postRepository,
                                ServiceRepository  $serviceRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->brandRepository = $brandRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->teamRepository = $teamRepository;
        $this->projectRepository = $projectRepository;
        $this->postRepository = $postRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function home()
    {
        $sliders = $this->sliderRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $feedbacks = $this->feedbackRepository->getAll();
        $team = $this->teamRepository->get(6);
        $projects = $this->projectRepository->get(6);
        $posts = $this->postRepository->get(6);
        $services = $this->serviceRepository->get(6);
        return view('site.home.index', compact('sliders', 'brands',
            'feedbacks', 'team', 'projects', 'posts', 'services'));
    }
}
