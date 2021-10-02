<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostComment\ManagementPostCommentRequest;
use App\Repositories\PostCommentRepository;
use Exception;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    private $postCommentRepository;

    public function __construct(PostCommentRepository $postCommentRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
    }

    public function pending()
    {
        $comments = $this->postCommentRepository->pending();
        return view('admin.posts.comments.pending', compact('comments'));
    }

    public function index()
    {
        $comments = $this->postCommentRepository->paginateByFilters();
        return view('admin.posts.comments.index', compact('comments'));
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
        return redirect()->route('posts.comments.index');
    }
}
