<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProductComment\ProductCommentRequest;
use App\Repositories\AlbumRepository;
use App\Repositories\ProductCommentRepository;
use App\Repositories\ProductRepository;
use Exception;

class ProductController extends Controller
{
    private $albumRepository;
    private $productRepository;
    private $productCommentRepository;

    public function __construct(AlbumRepository          $albumRepository,
                                ProductRepository        $productRepository,
                                ProductCommentRepository $productCommentRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->productRepository = $productRepository;
        $this->productCommentRepository = $productCommentRepository;
    }

    public function albums()
    {
        $albums = $this->albumRepository->getAllSubs();
        return view('site.albums.index', compact('albums'));
    }

    public function album($slug)
    {
        $album_id = extractId($slug);
        $album = $this->albumRepository->findById($album_id);
        $products = $this->productRepository->findByAlbumId($album_id);
        return view('site.albums.album.index', compact('album', 'products'));
    }

    public function index($slug)
    {
        $product_id = extractId($slug);
        $product = $this->productRepository->findById($product_id);
        $related = $this->productRepository->related($product->album->id, $product_id);
        $comments = $this->productCommentRepository->getActiveAllByProductId($product_id);
        $count_comments = count($comments);
        return view('site.product.index',
            compact('product', 'related',
                'comments', 'count_comments'));
    }

    public function register_comment(ProductCommentRequest $request, $product_id)
    {
        try {
            $product = $this->productRepository->findById(extractId($product_id));
            $this->productCommentRepository->store($request);
            newFeedback('پیام', 'نظر شما با موفقیت ثبت و پس از تایید توسط مدیریت نمایش داده میشود', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect($product->path());
    }
}
