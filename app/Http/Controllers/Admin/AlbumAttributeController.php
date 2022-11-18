<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumAttribute\StoreAlbumAttributeRequest;
use App\Http\Requests\Admin\AlbumAttribute\UpdateAlbumAttributeRequest;
use App\Repositories\AlbumAttributeRepository;
use App\Repositories\AlbumRepository;
use Exception;

class AlbumAttributeController extends Controller
{
    private $albumRepository;
    private $albumAttributeRepository;

    public function __construct(AlbumRepository          $albumRepository,
                                AlbumAttributeRepository $albumAttributeRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->albumAttributeRepository = $albumAttributeRepository;
    }

    public function index($album_id)
    {
        $album = $this->albumRepository->findById($album_id);
        if ($album['parent_id']!==null) {
            $attributes = $this->albumAttributeRepository->paginate($album_id);
            return view('admin.albums.attributes.index', compact('album', 'attributes'));
        }else{
            abort(403);
        }
    }

    public function create($album_id)
    {
        $album = $this->albumRepository->findById($album_id);
        if ($album['parent_id']!==null) {
            return view('admin.albums.attributes.create', compact('album'));
        }else{
            abort(403);
        }
    }

    public function store(StoreAlbumAttributeRequest $request, $album_id)
    {
        try {
            $this->albumAttributeRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('albums.attributes.create', $album_id);
    }

    public function edit($album_id, $id)
    {
        $album = $this->albumRepository->findById($album_id);
        if ($album['parent_id']!==null){
            $attribute = $this->albumAttributeRepository->findById($id);
            return view('admin.albums.attributes.edit', compact('album', 'attribute'));
        }else{
            abort(403);
        }
    }

    public function update(UpdateAlbumAttributeRequest $request, $album_id, $id)
    {
        try {
            $this->albumAttributeRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('albums.attributes.edit', [$album_id, $id]);
    }

    public function destroy($album_id, $id)
    {
        try {
            $attribute = $this->albumAttributeRepository->findById($id);
            $attribute->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('albums.attributes.index', $album_id);
    }
}
