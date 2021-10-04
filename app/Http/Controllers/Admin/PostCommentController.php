<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostComment\ManagementPostCommentRequest;
use App\Repositories\PostCommentRepository;
use App\Repositories\StatisticsRepository;
use Exception;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    private $postCommentRepository;
    private $statisticsRepository;

    public function __construct(PostCommentRepository $postCommentRepository,
                                StatisticsRepository  $statisticsRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
        $this->statisticsRepository = $statisticsRepository;
    }

    public function pending()
    {
        $comments = $this->postCommentRepository->pending();
        $pending = $this->statisticsRepository->getPendingPostCommentsCount();
        return view('admin.posts.comments.pending', compact('comments', 'pending'));
    }

    public function index()
    {
        $comments = $this->postCommentRepository->paginateByFilters();
        $active = $this->statisticsRepository->getActivePostCommentsCount();
        $inactive = $this->statisticsRepository->getInActivePostCommentsCount();
        $with_answer = $this->statisticsRepository->getPostCommentsCountWithAnswer();
        $without_answer = $this->statisticsRepository->getPostCommentsCountWithOutAnswer();
        return view('admin.posts.comments.index',
            compact('comments',
                'active', 'inactive',
                'with_answer', 'without_answer'));
    }

    public function single($id)
    {
        $comment = $this->postCommentRepository->findById($id);
        return view('admin.posts.comments.single', compact('comment'));
    }

    public function management(ManagementPostCommentRequest $request, $id)
    {
        try {
            $this->postCommentRepository->management($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.comments.single', $id);
    }

    public function destroy(Request $request, $id)
    {
        try {
            $comment = $this->postCommentRepository->findById($id);
            $comment->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route($request->get('route'));
    }

    public function update_status(Request $request, $id)
    {
        try {
            $this->postCommentRepository->updateStatus($request->get('status'), $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.comments.pending');
    }
}
