<?php

namespace Cryental\LaravelHashingSHA256;

use Illuminate\Support\ServiceProvider;

class LaravelHashingSHA256ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('hash')->extend('sha256', function () {
            return new SHA256Hasher();
        });
    }
}
