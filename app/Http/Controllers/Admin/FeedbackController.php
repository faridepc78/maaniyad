<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feedback\StoreFeedbackRequest;
use App\Http\Requests\Admin\Feedback\UpdateFeedbackRequest;
use App\Repositories\FeedbackRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    private $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index()
    {
        $feedbacks = $this->feedbackRepository->paginate();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedbacks.create');
    }

    public function store(StoreFeedbackRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $feedback = $this->feedbackRepository->store($request);

                if ($request->exists('image')) {
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'feedbacks', null)->id;
                    $this->feedbackRepository->addImage($image_id, $feedback->id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('feedbacks.create');
    }

    public function edit($id)
    {
        $feedback = $this->feedbackRepository->findById($id);
        return view('admin.feedbacks.edit', compact('feedback'));
    }

    public function update(UpdateFeedbackRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $feedback = $this->feedbackRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->feedbackRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'feedbacks', null)->id;
                    $this->feedbackRepository->addImage($image_id, $feedback->id);
                    if ($feedback->image) {
                        $feedback->image->delete();
                    }
                } else {
                    $this->feedbackRepository->update($request, $feedback->image_id, $id);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('feedbacks.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $feedback = $this->feedbackRepository->findById($id);

                if ($feedback->image) {
                    $feedback->image->delete();
                }

                $feedback->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('feedbacks.index');
    }
}
