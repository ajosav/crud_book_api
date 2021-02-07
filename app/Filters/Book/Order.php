<?php
namespace App\Filters\Book;

use App\Filters\Book\BaseFilter;

class Order extends BaseFilter {

    protected function applyFilter($builder)
    {
        $filter = request($this->filterName());
        if(in_array($filter, ['asc', 'desc'])) {
            return $builder->orderBy('id', $filter);
        }

        return $builder;
    }
}