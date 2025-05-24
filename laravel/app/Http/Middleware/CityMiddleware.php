<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\City;
// use App\helpers\CitySlug;

class CityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $city = ltrim(\request()->route()->getPrefix(), '/');
        $uri = $request->path();

        if(!$city && session('city')){
            return redirect('/' . session('city.slug') . "/$uri", 301);
        }
        if($city){
            $city_data = City::where('slug', '=', $city)->firstOrFail();
            session(['city' => $city_data ]);
        }
        
        return $next($request);
    }
}
