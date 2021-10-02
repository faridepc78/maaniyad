<?php

namespace App\Repositories;

use App\Filters\ContactUs\Search;
use App\Filters\ContactUs\Type;
use App\Models\ContactUs;
use Illuminate\Pipeline\Pipeline;

class ContactUsRepository
{
    public function store($values)
    {
        return ContactUs::query()
            ->create([
                'name' => $values['name'],
                'email' => $values['email'],
                'phone' => $values['phone'],
                'subject' => $values['subject'],
                'text' => $values['text'],
                'type' => $values['type']
            ]);
    }

    public function paginate()
    {
        return app(Pipeline::class)
            ->send(ContactUs::query())
            ->through([
                Type::class,
                Search::class
            ])
            ->thenReturn()
            ->orderBy('type', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function findById($id)
    {
        return ContactUs::query()
            ->findOrFail($id);
    }

    public function updateType($id)
    {
        return ContactUs::query()
            ->where('id', '=', $id)
            ->update([
                'type' => ContactUs::READ
            ]);
    }
}
