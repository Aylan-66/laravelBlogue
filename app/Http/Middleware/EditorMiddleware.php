<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $postId = $request->segments()[1];
        $post = Post::findOrFail($postId);
        
        if (Auth::user()->role()->first()->name == $role || $post->user_id == Auth::user()->id) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
