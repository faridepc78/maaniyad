<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\StatisticsRepository;

class DashboardController extends Controller
{
    private $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function index()
    {
        $projects = $this->statisticsRepository->getProjectsCount();
        $posts = $this->statisticsRepository->getActivePostsCount();
        $brands = $this->statisticsRepository->getBrandsCount();
        $contacts = $this->statisticsRepository->getContactsCount();
        return view('admin.dashboard.index',
            compact('projects', 'posts', 'brands', 'contacts'));
    }
}
