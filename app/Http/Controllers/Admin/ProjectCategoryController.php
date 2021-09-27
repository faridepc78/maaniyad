<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategory\StoreProjectCategoryRequest;
use App\Http\Requests\Admin\ProjectCategory\UpdateProjectCategoryRequest;
use App\Repositories\ProjectCategoryRepository;
use Exception;

class ProjectCategoryController extends Controller
{
    private $projectCategoryRepository;

    public function __construct(ProjectCategoryRepository $projectCategoryRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function index()
    {
        $categories = $this->projectCategoryRepository->paginate();
        return view('admin.projects.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.projects.categories.create');
    }

    public function store(StoreProjectCategoryRequest $request)
    {
        try {
            $this->projectCategoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects_categories.create');
    }

    public function edit($id)
    {
        $category = $this->projectCategoryRepository->findById($id);
        return view('admin.projects.categories.edit', compact('category'));
    }

    public function update(UpdateProjectCategoryRequest $request, $id)
    {
        try {
            $this->projectCategoryRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects_categories.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $category = $this->projectCategoryRepository->findById($id);
            $category->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects_categories.index');
    }
}
