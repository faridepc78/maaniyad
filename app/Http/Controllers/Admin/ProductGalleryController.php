<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGallery\ProductGalleryRequest;
use App\Repositories\ProductGalleryRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductGalleryController extends Controller
{
    private $productRepository;
    private $productGalleryRepository;

    public function __construct(ProductRepository        $productRepository,
                                ProductGalleryRepository $productGalleryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productGalleryRepository = $productGalleryRepository;
    }

    public function index($product_id)
    {
        $product = $this->productRepository->findById($product_id);
        $gallery = $this->productGalleryRepository->findGalleryByProductId($product_id);
        return view('admin.products.gallery.index', compact('product', 'gallery'));
    }

    public function store(ProductGalleryRequest $request, $project_id)
    {
        try {
            DB::transaction(function () use ($request) {
                $gallery = $this->productGalleryRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'products/gallery', null)->id;
                $this->productGalleryRepository->addImage($image_id, $gallery->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.gallery.index', $project_id);
    }

    public function destroy($project_id, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $gallery = $this->productGalleryRepository->findById($id);

                if ($gallery->image) {
                    $gallery->image->delete();
                }

                $gallery->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.gallery.index', $project_id);
    }
}
