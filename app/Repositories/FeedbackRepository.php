<?php

namespace App\Repositories;

use App\Models\Feedback;

class FeedbackRepository
{
    public function store($values)
    {
        return Feedback::query()
            ->create([
                'name' => $values['name'],
                'job' => $values['job'],
                'text' => $values['text'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Feedback::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Feedback::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Feedback::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Feedback::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'job' => $values['job'],
                'text' => $values['text'],
                'image_id' => $image_id
            ]);
    }

    public function getAll()
    {
        return Feedback::query()
            ->latest()
            ->get();
    }
}
