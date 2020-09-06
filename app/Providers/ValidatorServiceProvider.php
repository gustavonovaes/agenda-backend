<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    private array $weekEndDays = ['Sat', 'Sun'];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('not_weekend', function ($attribute, $value, $parameters) {
            $weedDay = date('D', strtotime($value));
            return \in_array($weedDay, $this->weekEndDays) === false;
        });
    }
}