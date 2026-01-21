<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();
        if($role === 'author' && !$user->can('create', Post::class)){
            abort(403, 'Unauthorized action, you must have author permissions to do this');
        }
        if($role !== 'author'){
            abort(403, 'No middleware for ' . $role);
        }
        return $next($request);
    }
}
