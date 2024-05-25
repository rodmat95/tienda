<?php

namespace App\Http\Middleware;

use App\Models\ShoppingCart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ShoppingCartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $latestSession = DB::table('sessions')->latest('last_activity')->first();

        $sessionID = $latestSession->id;

        $cart = ShoppingCart::where('session_id', $sessionID)->first();

        if (!$cart) {
            $cart = ShoppingCart::create(['session_id' => $sessionID, 'status' => 'pending']);
        }

        view()->share('shoppingCart', $cart);

        return $next($request);
    }
}