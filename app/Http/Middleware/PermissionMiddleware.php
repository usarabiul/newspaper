<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    
    use \App\Traits\UserPermission;
    public function handle($request, Closure $next)
    {
        $this->checkRequestPermission();
        return $next($request);
    }
}
