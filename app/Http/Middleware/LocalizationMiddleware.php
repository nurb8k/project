<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('localization') &&
            array_key_exists($request->session()->get('localization'), config('app.languages'))) {
           App::setLocale($request->session()->get('localization'));
        } else
            App::setLocale(config('app.fallback_locale'));

        return $next($request);
    }
}
