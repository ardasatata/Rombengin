<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use DB;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $id = Auth::id();
      $admin = DB::table('users')->where('id', $id)->value('admin');
      if ($admin) {
        return $next($request);
      }else {
          return response('Unauthorized.', 401);
        }
    }
}
