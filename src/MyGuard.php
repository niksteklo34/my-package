<?php

namespace MyPackage;

use Illuminate\Http\Request;
use Illuminate\Auth\GuardHelpers;

class MyGuard
{
    use GuardHelpers;

    public function __invoke(Request $request)
    {
        return 'user!';
    }
}