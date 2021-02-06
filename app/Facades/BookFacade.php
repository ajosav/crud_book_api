<?php

namespace App\Facades;

class BookFacade {

    public static function resolveFacade($name) {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('BookService'))
        ->$method(...$arguments);
    }
}