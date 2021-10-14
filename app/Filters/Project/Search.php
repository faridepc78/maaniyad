<?php


namespace App\Filters\Project;


use App\Filters\Filter;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('customer', 'like', '%' . $keyword . '%');
        } else {
            return $builder;
        }
    }
}
