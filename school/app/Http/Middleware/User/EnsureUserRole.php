<?php

namespace App\Http\Middleware\User;

use App\Helpers\Interfaces\Roles;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param mixed $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $hasRole = $request->user()->hasRole(\AppConst::SCHOOL_COUNSELOR);
        $role = \Auth::user()->roles()->first()->role;
        if(!$hasRole){
            $msg  = "This is a {$role} and to log into the School Counselor Portal you must have a Counselor Account.";
            if ($request->expectsJson()) {
                return response(['message'=>$msg],401);
            }
            return abort(401,$msg);
        }
        return $next($request);
    }
}
