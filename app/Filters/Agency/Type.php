<?php


namespace App\Filters\Agency;


use App\Filters\Filter;
use App\Models\Agency;
use App\Models\ContactUs;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Agency::READ) {
            return $builder->where('type', '=', Agency::READ);
        } elseif ($keyword == Agency::UNREAD) {
            return $builder->where('type', '=', Agency::UNREAD);
        } else {
            return $builder;
        }
    }
}
