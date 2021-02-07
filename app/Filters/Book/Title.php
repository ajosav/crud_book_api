<?php
namespace App\Filters\Book;

use App\Filters\Book\BaseFilter;

class Title extends BaseFilter {

    protected function applyFilter($builder)
    {
        $filter = request($this->filterName());
        return $builder->where($this->filterName(), 'like', '%' . $filter . '%');
    }
}