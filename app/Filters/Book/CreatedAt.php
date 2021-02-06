<?php
namespace App\Filters\Book;

use Exception;
use Carbon\Carbon;
use App\Traits\Format;
use App\Filters\Book\BaseFilter;

class CreatedAt extends BaseFilter {
    use Format;

    protected function applyFilter($builder)
    {
        try {
            $date = request($this->filterName());
            $created_at = Carbon::parse($date)->format('Y-m-d');
            return $builder->whereDate($this->filterName(), $created_at);
        } catch(Exception $e) {
            return $builder;
        }

    }
}