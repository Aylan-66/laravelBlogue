<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware
{
        /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle(Request $request, Closure $next)
    {
        $postId = $request->segments()[1];
        $post = Post::findOrFail($postId);

        //if ($post->user_id !== $this->auth->getUser()->id) {
        if ($post->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
