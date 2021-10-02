<?php


namespace App\Filters\ContactUs;


use App\Filters\Filter;
use App\Models\ContactUs;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == 'read') {
            return $builder->where('type', '=', ContactUs::READ);
        } elseif ($keyword == 'unread') {
            return $builder->where('type', '=', ContactUs::UNREAD);
        }
    }
}
