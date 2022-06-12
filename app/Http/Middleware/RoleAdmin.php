<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleAdmin
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (User::ROLE_ADMIN === auth()->user()->role) return $next($request);
        else return redirect()->intended(route('user.index'));
    }
}
