<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostMedia\PostMediaRequest;
use App\Repositories\PostMediaRepository;
use App\Repositories\PostRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class PostMediaController extends Controller
{
    private $postRepository;
    private $postMediaRepository;

    public function __construct(PostRepository      $postRepository,
                                PostMediaRepository $postMediaRepository)
    {
        $this->postRepository = $postRepository;
        $this->postMediaRepository = $postMediaRepository;
    }

    public function index($post_id)
    {
        $post = $this->postRepository->findById($post_id);
        $media = $this->postMediaRepository->findMediaByPostId($post_id);
        return view('admin.posts.media.index', compact('post', 'media'));
    }

    public function store(PostMediaRequest $request, $post_id)
    {
        try {
            DB::transaction(function () use ($request) {
                $media = $this->postMediaRepository->store($request);
                $media_id = MediaFileService::publicUpload($request->file('media'),
                    'posts/media', null)->id;
                $this->postMediaRepository->addMedia($media_id, $media->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.media.index', $post_id);
    }

    public function destroy($post_id, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $media = $this->postMediaRepository->findById($id);

                if ($media->media) {
                    $media->media->delete();
                }

                $media->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.media.index', $post_id);
    }
}
