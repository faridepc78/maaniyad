<?php


namespace App\Filters\Project;


use App\Filters\Filter;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->where('customer', 'like', '%' . $keyword . '%')
                ->orWhereHas('category', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
        } else {
            return $builder;
        }
    }
}
