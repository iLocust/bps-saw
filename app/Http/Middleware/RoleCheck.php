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
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

        foreach ($roles as $role) {
            if ($role == 'pengawas' && auth()->user()->isPengawas()) {
                return $next($request);
            }

            if ($role == 'pekerja' && auth()->user()->isPekerja()) {
                return $next($request);
            }
        }

        abort(403, 'Hak akses tidak valid');
    }
}
