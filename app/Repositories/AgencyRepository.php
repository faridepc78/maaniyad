<?php

namespace App\Repositories;

use App\Filters\Agency\Search;
use App\Filters\Agency\Type;
use App\Models\Agency;
use Illuminate\Pipeline\Pipeline;

class AgencyRepository
{
    public function store($values)
    {
        return Agency::query()
            ->create([
                'company_name' => $values['company_name'],
                'name' => $values['name'],
                'site' => $values['site'],
                'province' => $values['province'],
                'city' => $values['city'],
                'experience' => $values['experience'],
                'area' => $values['area'],
                'main_brands' => $values['main_brands'],
                'other_brands' => $values['other_brands'],
                'instagram' => $values['instagram'],
                'telegram' => $values['telegram'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'mobile' => $values['mobile'],
                'email' => $values['email'],
                'type' => $values['type']
            ]);
    }

    public function paginate()
    {
        return app(Pipeline::class)
            ->send(Agency::query())
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
        return Agency::query()
            ->findOrFail($id);
    }

    public function updateType($id)
    {
        return Agency::query()
            ->where('id', '=', $id)
            ->update([
                'type' => Agency::READ
            ]);
    }
}
