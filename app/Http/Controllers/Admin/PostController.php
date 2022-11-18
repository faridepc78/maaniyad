<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $postCategoryRepository;
    private $postRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository,
                                PostRepository         $postRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->paginateByFilters();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->postCategoryRepository->getAll();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $post = $this->postRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'posts', null)->id;
                $this->postRepository->addImage($image_id, $post->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.create');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        $categories = $this->postCategoryRepository->getAll();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $post = $this->postRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->postRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'posts', null)->id;
                    $this->postRepository->addImage($image_id, $post->id);
                    if ($post->image) {
                        $post->image->delete();
                    }
                } else {
                    $this->postRepository->update($request, $post->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post = $this->postRepository->findById($id);

                if ($post->image) {
                    $post->image->delete();
                }

                if (count($post->media)) {
                    foreach ($post->media as $media) {
                        $media->media->delete();
                    }
                }

                $post->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.index');
    }
}
