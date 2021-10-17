<?php


namespace App\Filters\Comment\Product;


use App\Filters\Filter;

class Answer extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {

            if ($keyword == 'yes') {
                return $builder->where('answer', '!=', '');
            } elseif ($keyword == 'no') {
                return $builder->whereNull('answer')
                    ->orWhere('answer', '=', '');
            } else {
                return $builder;
            }
        } else {
            return $builder;
        }
    }
}
