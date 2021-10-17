<?php

namespace App\Repositories;

use App\Filters\Comment\Product\Answer;
use App\Filters\Comment\Product\Search;
use App\Filters\Comment\Product\Status;
use App\Models\ProductComment;
use Illuminate\Pipeline\Pipeline;

class ProductCommentRepository
{
    public function store($values)
    {
        return ProductComment::query()
            ->create([
                'product_id' => $values['product_id'],
                'name' => $values['name'],
                'email' => $values['email'],
                'mobile' => $values['mobile'],
                'site' => $values['site'],
                'message' => $values['message'],
                'status' => $values['status']
            ]);
    }

    public function pending()
    {
        return app(Pipeline::class)
            ->send(ProductComment::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->where('status', '=', ProductComment::PENDING)
            ->latest()
            ->paginate(10);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(ProductComment::query())
            ->through([
                Search::class,
                Status::class,
                Answer::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return ProductComment::query()
            ->findOrFail($id);
    }

    public function updateStatus($status, $id)
    {
        return ProductComment::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }

    public function management($values, $id)
    {
        return ProductComment::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $values['status'],
                'answer' => $values['answer'],
                'admin_name' => $values['admin_name'],
                'admin_profile' => $values['admin_profile']
            ]);
    }

    public function getActiveAllByProductId($product_id)
    {
        $data =
            [
                ['product_id', '=', $product_id],
                ['status', '=', ProductComment::ACTIVE]
            ];
        return ProductComment::query()
            ->where($data)
            ->latest()
            ->paginate(20);
    }
}
