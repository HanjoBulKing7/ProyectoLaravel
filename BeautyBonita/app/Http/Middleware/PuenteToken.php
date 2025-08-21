<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PuenteToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('X-PUENTE-TOKEN');

        if ($token !== config('services.puente.token')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
