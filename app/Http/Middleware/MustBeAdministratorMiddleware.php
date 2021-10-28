<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MustBeAdministratorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->username!=='JustinMassart')
        abort(ResponseAlias::HTTP_FORBIDDEN);
        return $next($request);
    }
}
