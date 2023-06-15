<?php

namespace App\Http\Middleware;

use App\Models\UserModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ProductLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     

        $permission = Cache::remember('permission', 60, function () {
            $users = new UserModel();

            $id = $_SESSION['VERSION_USER'];
            return $users->getPermissionUser($id);
        }); 


        foreach($permission as $value){
            if($value->permission_url == 'admin' || $value->permission_url == 'admin/product'){
                return $next($request);
            }
        }

        return redirect(route('admin.index'))->with('msg','Bạn không có quyền truy cập nội dung này!');
    }
}
