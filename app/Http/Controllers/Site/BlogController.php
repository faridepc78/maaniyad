<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PostComment\PostCommentRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostCommentRepository;
use App\Repositories\PostRepository;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $postCategoryRepository;
    private $postRepository;
    private $postCommentRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository,
                                PostRepository         $postRepository,
                                PostCommentRepository  $postCommentRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
        $this->postCommentRepository = $postCommentRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAllByPaginate();
        return view('site.blog.index', compact('posts'));
    }

    public function post($slug)
    {
        $post_id = extractId($slug);
        $post = $this->postRepository->findById($post_id);
        $related_posts = $this->postRepository->related($post->category->id, $post_id);
        $comments = $this->postCommentRepository->getActiveAllByPostId($post_id);
        $count_comments = count($comments);
        return view('site.blog.post.index',
            compact('post', 'related_posts',
                'comments', 'count_comments'));
    }

    public function category($slug)
    {
        $category_id = extractId($slug);
        $category = $this->postCategoryRepository->findById($category_id);
        $posts = $this->postRepository->findByCategoryId($category_id);
        return view('site.blog.category.index',
            compact('category', 'posts'));
    }

    public function search(Request $request)
    {

        $keyword = $request->input('search');
        $posts = $this->postRepository->search($keyword);
        return view('site.blog.search.index',
            compact('keyword', 'posts'));
    }

    public function register_comment(PostCommentRequest $request, $post_id)
    {
        try {
            $post = $this->postRepository->findById(extractId($post_id));
            $this->postCommentRepository->store($request);
            newFeedback('پیام', 'نظر شما با موفقیت ثبت و پس از تایید توسط مدیریت نمایش داده میشود', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect($post->path());
    }
}
