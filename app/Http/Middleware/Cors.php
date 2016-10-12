<?php
/**
 * Created by PhpStorm.
 * User: zjx
 * Date: 2016/9/12
 * Time: 11:06
 */

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT');
    }
}