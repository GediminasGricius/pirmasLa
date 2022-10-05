<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RandomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

       ///Kodas vykdomas pries krovima
       $response= $next($request);
       //Kodas vykdomas po krovimo
       $html= $response->content();
       $html=str_replace('+37067021276', '***', $html);
       $response->setContent($html);
       return $response;
    }
}
