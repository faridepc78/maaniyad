<?php


namespace App\Filters\Product\Album;


use App\Filters\Filter;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->where('name', 'like', '%' . $keyword . '%');
        } else {
            return $builder;
        }
    }
}
