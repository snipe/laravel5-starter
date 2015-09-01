<?php

namespace App\Providers;

use App\Services\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider{

    public function boot()
    {
        \Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new Validator($translator, $data, $rules, $messages);
        });
    }

    public function register()
    {
    }
}
