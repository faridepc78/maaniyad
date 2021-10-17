<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Repositories\AlbumRepository;
use App\Repositories\ProductAttributeValueRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $albumRepository;
    private $productRepository;
    private $productAttributeValueRepository;

    public function __construct(AlbumRepository                 $albumRepository,
                                ProductRepository               $productRepository,
                                ProductAttributeValueRepository $productAttributeValueRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->productRepository = $productRepository;
        $this->productAttributeValueRepository = $productAttributeValueRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginateByFilters();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $albums = $this->albumRepository->getAll();
        return view('admin.products.create', compact('albums'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $this->productRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'products', null)->id;
                $this->productRepository->addImage($image_id, $product->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.create');
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $albums = $this->albumRepository->getAll();
        return view('admin.products.edit', compact('product', 'albums'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $product = $this->productRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->productRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'products', null)->id;
                    $this->productRepository->addImage($image_id, $product->id);
                    if ($product->image) {
                        $product->image->delete();
                    }
                } else {
                    $this->productRepository->update($request, $product->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $product = $this->productRepository->findById($id);

                if ($product->image) {
                    $product->image->delete();
                }

                if (count($product->gallery)) {
                    foreach ($product->gallery as $image) {
                        $image->image->delete();
                    }
                }

                $product->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.index');
    }

    public function attributes($product_id)
    {
        $product = $this->productRepository->findById($product_id);
        $attributes = $product->album->attributes;
        return view('admin.products.attributes.index',
            compact('product', 'attributes'));
    }

    public function attributes_createOrUpdate(Request $request, $product_id)
    {
        try {
            foreach ($request->input('val') as $keys => $value) {
                $this->productAttributeValueRepository->createOrUpdate($keys, $product_id, $value[0]);
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('product.attributes', $product_id);
    }
}
