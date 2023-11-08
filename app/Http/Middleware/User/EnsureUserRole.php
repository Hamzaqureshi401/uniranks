<?php

namespace App\Http\Middleware\User;

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
    public function handle(Request $request, Closure $next,...$roles)
    {
        $hasRole = false;
        if (count($roles) > 1){
            foreach ($roles as $role) {
                $hasRole = $request->user()->hasRole($role);
                if ($hasRole) break;
            }
            $as = "Admin";
        }else{
            $hasRole = $request->user()->hasRole($roles[0]);
            $as = User\Role::find($roles[0],'role')->role;
        }
        if(!$hasRole){
            $msg  = "You are not authorized to access {$as} account.";
            if ($request->expectsJson()) {
                return response(['message'=>$msg],401);
            }
            return abort(401,$msg);
        }
        return $next($request);
    }
}
