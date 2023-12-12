<?php

namespace App\Http\Middleware\User;

use App\Models\Session;
use Closure;
use Illuminate\Http\Request;

class AddSessionsHistory
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
        if (\Auth::check()) {
            $sessions = Session::where('user_id', \Auth::user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')->whereDoesntHave('history')
                ->get();
            if ($sessions->count() > 0) {
                $sessions->each(function ($session) {
                    /**
                     * @var Session $session
                     */
                    $session->history()->create([
                        'user_id' => \Auth::id(),
                        'country' => session('country_info')['name'],
                        'ip_address' => $session->ip_address,
                        'user_agent' => $session->user_agent,
                    ]);
                });
            }
        }
        return $next($request);
    }
}
