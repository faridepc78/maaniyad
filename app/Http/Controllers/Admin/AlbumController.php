<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Album\StoreAlbumRequest;
use App\Http\Requests\Admin\Album\UpdateAlbumRequest;
use App\Repositories\AlbumRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    private $albumRepository;
    private $productRepository;

    public function __construct(AlbumRepository   $albumRepository,
                                ProductRepository $productRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $albums = $this->albumRepository->paginate();
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        $getParents = $this->albumRepository->getParents();
        return view('admin.albums.create', compact('getParents'));
    }

    public function store(StoreAlbumRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $album = $this->albumRepository->store($request);
                if ($request->exists('image')) {
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'albums', null)->id;
                    $this->albumRepository->addImage($image_id, $album->id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('albums.create');
    }

    public function show($id)
    {
        $album = $this->albumRepository->findById($id);

        if ($album['parent_id'] == null) {
            $albums = $this->albumRepository->getSubs($album['id']);
            return view('admin.albums.show', compact('albums', 'album'));
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        $getParents = $this->albumRepository->getParents();
        $album = $this->albumRepository->findById($id);
        return view('admin.albums.edit', compact('getParents', 'album'));
    }

    public function update(UpdateAlbumRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $album = $this->albumRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->albumRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'albums', null)->id;
                    $this->albumRepository->addImage($image_id, $album->id);
                    if ($album->image) {
                        $album->image->delete();
                    }
                } else {
                    $this->albumRepository->update($request, $album->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('albums.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $album = $this->albumRepository->findById($id);

                if (count($album->sub)) {
                    newFeedback('پیام', 'حذف امکان پذیر نیست این آلبوم دارای زیر مجموعه است', 'warning');
                } else {
                    if ($album->image) {
                        $album->image->delete();
                    }

                    $album->delete();
                    DB::commit();
                    newFeedback();
                }
            });
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->back();
    }

    public function products($album_id)
    {
        $album = $this->albumRepository->findById($album_id);
        if ($album['parent_id'] !== null) {
            $products = $this->productRepository->paginateByFiltersByAlbumId($album_id);
            return view('admin.albums.products.index', compact('album', 'products'));
        } else {
            abort(403);
        }
    }
}
