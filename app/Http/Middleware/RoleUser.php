<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleUser
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (User::ROLE_USER === auth()->user()->role) return $next($request);
        else return redirect()->intended(route('admin.dashboard.index'));
    }
}
