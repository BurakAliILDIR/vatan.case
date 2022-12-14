<?php

namespace App\Http\Middleware;

use App\Enum\Common\ResponseTypeEnum;
use App\Enum\Log\LogTypeEnum;
use App\Events\LoggerEvent;
use App\Helper\Common\AuthHelper;
use App\Helper\Common\ResponseHelper;
use Closure;
use Illuminate\Http\Request;

class AuthorizationMiddleware
{

    public function handle( Request $request, Closure $next )
    {

        // TODO : Log kaydı
        event(new LoggerEvent($request->ip(), LogTypeEnum::LOGIN_REQUEST));

        // TODO : Key kontrolü
        if ( AuthHelper::permission($request) )
            return $next($request);

        // TODO : Olumsuz cevap.
        return ResponseHelper::json_response(ResponseTypeEnum::WARNING, "Oturum bilgisi doğru değil.", NULL);
    }
}
