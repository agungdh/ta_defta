<?php

namespace App\Http\Middleware;

use ADHhelper;

use Closure;
use Illuminate\Support\Facades\Route;

use Session;

class Menu
{
    public function handle($request, Closure $next, $menu)
    {
    	Session::flash('activeMenu', $menu); 

        return $next($request);
    }
}
