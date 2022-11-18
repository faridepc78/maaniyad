<?php


namespace App\Filters\Comment\Post;


use App\Filters\Filter;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->whereHas('post', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            });
        } else {
            return $builder;
        }
    }
}
