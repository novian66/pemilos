<?php

namespace App\Http\Middleware;

use App\Models\Api\ApiToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CheckHeader
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
        if (empty($request->header('FB-CODE'))) {
            return Response::json(array('error' => 'Please set Header FB-CODE : Token API'));
        }

        $token = ApiToken::where('token', $request->header('FB-CODE'))->first();

        if (empty($token)) {
            return Response::json(array('error' => 'wrong Api Token, try again'));
        }

        return $next($request);
    }
}
