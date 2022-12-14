<?php

namespace App\Helper\Common;

use Illuminate\Http\Request;

class AuthHelper
{

    static function permission( Request $request ): bool
    {
        return $request->hasHeader('Authorization') && $request->header('Authorization') === config('auth.key');
    }
}
