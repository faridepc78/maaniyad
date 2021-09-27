<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    private $projectCategoryRepository;
    private $projectRepository;

    public function __construct(ProjectCategoryRepository $projectCategoryRepository,
                                ProjectRepository         $projectRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->paginateByFilters();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = $this->projectCategoryRepository->getAll();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $project = $this->projectRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'projects', null)->id;
                $this->projectRepository->addImage($image_id, $project->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.create');
    }

    public function edit($id)
    {
        $project = $this->projectRepository->findById($id);
        $categories = $this->projectCategoryRepository->getAll();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $project = $this->projectRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->projectRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'projects', null)->id;
                    $this->projectRepository->addImage($image_id, $project->id);
                    if ($project->image) {
                        $project->image->delete();
                    }
                } else {
                    $this->projectRepository->update($request, $project->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $project = $this->projectRepository->findById($id);

                if ($project->image) {
                    $project->image->delete();
                }

                if (count($project->gallery)) {
                    foreach ($project->gallery as $image) {
                        $image->image->delete();
                    }
                }

                $project->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.index');
    }
}
