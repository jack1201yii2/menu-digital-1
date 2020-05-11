<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class SuperUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //return $dir = explode("/", URL::current());
        if(auth()->user()->branch_office_id == null && auth()->user()->restaurantUsers->count() > 0){
            return $next($request);
        }

        //return redirect()->back();
    }
}
