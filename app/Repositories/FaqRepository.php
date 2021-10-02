<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqRepository
{
    public function store($values)
    {
        return Faq::query()
            ->create([
                'name' => $values['name'],
                'value' => $values['value']
            ]);
    }

    public function paginate()
    {
        return Faq::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Faq::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Faq::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'value' => $values['value']
            ]);
    }

    public function getAll()
    {
        return Faq::query()
            ->latest()
            ->get();
    }
}
