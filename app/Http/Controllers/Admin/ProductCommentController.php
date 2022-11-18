<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductComment\ManagementProductCommentRequest;
use App\Repositories\ProductCommentRepository;
use App\Repositories\StatisticsRepository;
use Exception;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    private $productCommentRepository;
    private $statisticsRepository;

    public function __construct(ProductCommentRepository $productCommentRepository,
                                StatisticsRepository     $statisticsRepository)
    {
        $this->productCommentRepository = $productCommentRepository;
        $this->statisticsRepository = $statisticsRepository;
    }

    public function pending()
    {
        $comments = $this->productCommentRepository->pending();
        $pending = $this->statisticsRepository->getPendingProductCommentsCount();
        return view('admin.products.comments.pending', compact('comments', 'pending'));
    }

    public function index()
    {
        $comments = $this->productCommentRepository->paginateByFilters();
        $active = $this->statisticsRepository->getActiveProductCommentsCount();
        $inactive = $this->statisticsRepository->getInActiveProductCommentsCount();
        $with_answer = $this->statisticsRepository->getProductCommentsCountWithAnswer();
        $without_answer = $this->statisticsRepository->getProductCommentsCountWithOutAnswer();
        return view('admin.products.comments.index',
            compact('comments',
                'active', 'inactive',
                'with_answer', 'without_answer'));
    }

    public function single($id)
    {
        $comment = $this->productCommentRepository->findById($id);
        return view('admin.products.comments.single', compact('comment'));
    }

    public function management(ManagementProductCommentRequest $request, $id)
    {
        try {
            $this->productCommentRepository->management($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.comments.single', $id);
    }

    public function destroy(Request $request, $id)
    {
        try {
            $comment = $this->productCommentRepository->findById($id);
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
            $this->productCommentRepository->updateStatus($request->get('status'), $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.comments.pending');
    }
}
