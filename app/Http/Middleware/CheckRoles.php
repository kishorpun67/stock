<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin\Permission;
use App\Admin\AdminPermission;
class 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {

        if(!$request->user()->hasRole($role)) {

            abort(404);

       }

       if($permission !== null && !$request->user()->can($permission)) {

             abort(404);
       }
        
        // $rolesids = $roles[$role] ?? '';
        // if(!in_array(auth('admin')->user()->role_id, $roles[$role])){
        //     return redirect('/admin/dashboard' )->with('error_message', 'You are not allowed');
        // }
        return $next($request);
    }
}
