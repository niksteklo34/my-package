<?php

namespace MyPackage;

use Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MyAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->config['auth.guards.my_package_auth'] = [
            'driver' => 'my_package_auth',
            'provider' => null
        ];
    }

    public function boot(): void
    {
        Auth::resolved(function ($auth) {
            $auth->extend('my_package_auth', function ($app) use ($auth) {
                return $this->createGuard();
            });
        });
    }

    private function createGuard(): RequestGuard
    {
        return new RequestGuard(
            new MyGuard(),
            $this->app->request
        );
    }
}
