<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreTeamRequest;
use App\Http\Requests\Admin\Team\UpdateTeamRequest;
use App\Repositories\TeamRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index()
    {
        $team = $this->teamRepository->paginate();
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(StoreTeamRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $team = $this->teamRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'team', null)->id;
                $this->teamRepository->addImage($image_id, $team->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('team.create');
    }

    public function edit($id)
    {
        $team = $this->teamRepository->findById($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $team = $this->teamRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->teamRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'team', null)->id;
                    $this->teamRepository->addImage($image_id, $team->id);
                    if ($team->image) {
                        $team->image->delete();
                    }
                } else {
                    $this->teamRepository->update($request, $team->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('team.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $team = $this->teamRepository->findById($id);

                if ($team->image) {
                    $team->image->delete();
                }

                $team->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('team.index');
    }
}
