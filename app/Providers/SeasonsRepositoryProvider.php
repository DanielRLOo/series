<?php

namespace App\Providers;

use App\Repositories\Implementations\Eloquent\EloquentSeasonsRepository;
use App\Repositories\SeasonsRepository;
use Illuminate\Support\ServiceProvider;

class SeasonsRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeasonsRepository::class => EloquentSeasonsRepository::class
    ];
}
