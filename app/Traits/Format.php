<?php

namespace App\Traits;


trait Format {

    protected function formatDateTime($time)
    {
        return date_format($time, 'h:i:s');
    }

    protected function formatDate($date)
    {
        return date_format(date_create($date), 'Y-m-d');
    }

}
