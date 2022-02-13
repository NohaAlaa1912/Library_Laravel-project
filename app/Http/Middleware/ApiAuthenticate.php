<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuthenticate
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
        $access_token = $request->header('access_token');
        
        if ($access_token !== null) {
            $user = User::where('access_token', '=', $access_token)->first();

            if ($user !== null) {
                return $next($request);
            } else {
                return response()->json(['msg' => 'token not valid']);
            }

        } else {
            return response()->json(['msg' => 'token not sent']);
        }
    }
}
