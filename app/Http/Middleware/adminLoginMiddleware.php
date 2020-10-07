<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Middlewares\RoleMiddleware;

class adminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if (! $request->user()->hasRole('admin')) {
                return redirect('admin/login')->with('thongbao','Mời bạn đăng nhập bằng tài khoản admin');
            }else return $next($request);
        }else return redirect('admin/login')->with('thongbao','Mời bạn đăng nhập bằng tài khoản admin');
    
    }
}
