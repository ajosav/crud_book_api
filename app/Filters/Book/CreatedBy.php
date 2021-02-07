<?php
namespace App\Filters\Book;

use App\Filters\Book\BaseFilter;

class CreatedBy extends BaseFilter {

    protected function applyFilter($builder)
    {
        return $builder->whereHas('user', function($query) {
            $query->where('email', request($this->filterName()));
        });
    }
}