<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Agency\AgencyRequest;
use App\Http\Requests\Site\ContactUs\ContactUsRequest;
use App\Repositories\AgencyRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SliderRepository;
use Exception;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $sliderRepository;
    private $brandRepository;
    private $feedbackRepository;
    private $projectRepository;
    private $postRepository;
    private $contactUsRepository;
    private $agencyRepository;
    private $productRepository;

    public function __construct(SliderRepository    $sliderRepository,
                                BrandRepository     $brandRepository,
                                FeedbackRepository  $feedbackRepository,
                                ProjectRepository   $projectRepository,
                                PostRepository      $postRepository,
                                ContactUsRepository $contactUsRepository,
                                AgencyRepository    $agencyRepository,
                                ProductRepository   $productRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->brandRepository = $brandRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->projectRepository = $projectRepository;
        $this->postRepository = $postRepository;
        $this->contactUsRepository = $contactUsRepository;
        $this->agencyRepository = $agencyRepository;
        $this->productRepository = $productRepository;
    }

    public function home()
    {
        $sliders = $this->sliderRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $feedbacks = $this->feedbackRepository->getAll();
        $projects = $this->projectRepository->get(6);
        $posts = $this->postRepository->get(6);
        $products = $this->productRepository->random();
        return view('site.home.index', compact('sliders', 'brands',
            'feedbacks', 'projects', 'posts', 'products'));
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
            newFeedback('پیام', 'پیام شما با موفقیت ارسال شد به زودی با شما تماس میگیریم', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact-us');
    }

    public function agency()
    {
        return view('site.agency.index');
    }

    public function agency_send(AgencyRequest $request)
    {
        try {
            $this->agencyRepository->store($request);
            newFeedback('پیام', 'درخواست شما با موفقیت ارسال شد به زودی با شما تماس میگیریم', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('agency');
    }

    public function projects()
    {
        $projects = $this->projectRepository->site_paginate();
        return view('site.projects.index', compact('projects'));
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
