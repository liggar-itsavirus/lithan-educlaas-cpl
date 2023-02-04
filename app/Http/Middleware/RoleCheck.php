<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $userRole = auth()->user()->role;
        if ($userRole != $role) {
            // sweetAlert()->addWarning("You don't have acces to this page");

            // $this->flash('warning', "You don't have a permission to that page", ['position' => 'center', 'toast' => false, 'timer' => '10000'], '/dashboard');
            return redirect()->route($userRole . '.index');
        }

        return $next($request);
    }
}
