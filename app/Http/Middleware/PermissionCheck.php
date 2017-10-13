<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PermissionCheck
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
        $action = $request->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);

        $permissions = config("permission-list");
        $keys = array_keys($permissions);
        if (in_array($controller, $keys)) {
            $actions = $permissions[$controller];
            if (in_array($action, $actions)) {
                if (!Auth::user()->hasPermissionTo($action. " " .$controller)) {
                    return redirect(route('home'));
                }
            }
        }
        return $next($request);
    }
}
