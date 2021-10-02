<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactUs\ContactUsRequest;
use App\Repositories\BrandRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\FaqRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SliderRepository;
use App\Repositories\TeamRepository;
use Exception;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $sliderRepository;
    private $brandRepository;
    private $feedbackRepository;
    private $teamRepository;
    private $projectRepository;
    private $projectCategoryRepository;
    private $postRepository;
    private $serviceRepository;
    private $contactUsRepository;
    private $faqRepository;

    public function __construct(SliderRepository          $sliderRepository,
                                BrandRepository           $brandRepository,
                                FeedbackRepository        $feedbackRepository,
                                TeamRepository            $teamRepository,
                                ProjectRepository         $projectRepository,
                                ProjectCategoryRepository $projectCategoryRepository,
                                PostRepository            $postRepository,
                                ServiceRepository         $serviceRepository,
                                ContactUsRepository       $contactUsRepository,
                                FaqRepository             $faqRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->brandRepository = $brandRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->teamRepository = $teamRepository;
        $this->projectRepository = $projectRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->postRepository = $postRepository;
        $this->serviceRepository = $serviceRepository;
        $this->contactUsRepository = $contactUsRepository;
        $this->faqRepository = $faqRepository;
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

    public function about_us()
    {
        return view('site.about-us.index');
    }

    public function contact_us()
    {
        return view('site.contact-us.index');
    }

    public function contact_us_send(ContactUsRequest $request)
    {
        try {
            $this->contactUsRepository->store($request);
            newFeedback('پیام', 'پیام شما با موفقیت ارسال شد', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact-us');
    }

    public function services()
    {
        $services = $this->serviceRepository->get();
        return view('site.services.index', compact('services'));
    }

    public function service($slug)
    {
        $service = $this->serviceRepository->findById(extractId($slug));
        return view('site.services.single.index', compact('service'));
    }

    public function team()
    {
        $team = $this->teamRepository->get();
        return view('site.team.index', compact('team'));
    }

    public function faq()
    {
        $faqs = $this->faqRepository->getAll();
        return view('site.faq.index', compact('faqs'));
    }

    public function projects()
    {
        $projects = $this->projectRepository->site_paginate();
        return view('site.projects.index', compact('projects'));
    }

    public function projects_category($slug)
    {
        $category_id = extractId($slug);
        $category = $this->projectCategoryRepository->findById($category_id);
        $projects = $this->projectRepository->findByCategoryId($category_id);
        return view('site.projects.category.index',
            compact('category', 'projects'));
    }

    public function project($slug)
    {
        $project = $this->projectRepository->findById(extractId($slug));
        return view('site.projects.single.index', compact('project'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $projects = $this->projectRepository->search($keyword);
        return view('site.projects.search.index',
            compact('keyword', 'projects'));
    }
}
