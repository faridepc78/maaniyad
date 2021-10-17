<?php


namespace App\Filters\Comment\Product;


use App\Filters\Filter;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->whereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            });
        } else {
            return $builder;
        }
    }
}
