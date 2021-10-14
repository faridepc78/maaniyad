<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateProductCategoryRequest;
use App\Repositories\ProductCategoryRepository;
use Exception;

class ProductCategoryController extends Controller
{
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function index()
    {
        $categories = $this->productCategoryRepository->paginate();
        return view('admin.products.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.products.categories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        try {
            $this->productCategoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products_categories.create');
    }

    public function edit($id)
    {
        $category = $this->productCategoryRepository->findById($id);
        return view('admin.products.categories.edit', compact('category'));
    }

    public function update(UpdateProductCategoryRequest $request, $id)
    {
        try {
            $this->productCategoryRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products_categories.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $category = $this->productCategoryRepository->findById($id);
            $category->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products_categories.index');
    }
}
