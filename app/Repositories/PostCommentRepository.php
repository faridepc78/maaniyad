<?php

namespace App\Repositories;

use App\Filters\Comment\Answer;
use App\Filters\Comment\Search;
use App\Filters\Comment\Status;
use App\Models\PostComment;
use Illuminate\Pipeline\Pipeline;

class PostCommentRepository
{
    public function store($values)
    {
        return PostComment::query()
            ->create([
                'post_id' => $values['post_id'],
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
            ->send(PostComment::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->where('status', '=', PostComment::PENDING)
            ->latest()
            ->paginate(10);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(PostComment::query())
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
        return PostComment::query()
            ->findOrFail($id);
    }

    public function updateStatus($status, $id)
    {
        return PostComment::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }

    public function management($values, $id)
    {
        return PostComment::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $values['status'],
                'answer' => $values['answer']
            ]);
    }
}
