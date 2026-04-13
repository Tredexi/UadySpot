<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {

            $lastActivity = session('lastActivityTime');

            if ($lastActivity &&
                (time() - $lastActivity > 600)) // 600 = 10 min
            {

                Auth::logout();

                session()->flush();

                return redirect()
                    ->route('login')
                    ->with('message',
                    'Tu sesión expiró por inactividad.');

            }

            session(['lastActivityTime' => time()]);

        }

        return $next($request);

    }

}