<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getPermission($screen)
    {
        $user = Auth::user();
        if($user->type != 'superadmin'){
            $permission_id = Permission::select('id')->where('nameScreen','=',$screen)->first();
            $role = DB::table('permission_user')
            ->select('permission_user.type')->where('user_id','=',$user->id)->where('permission_id','=',$permission_id->id)
            ->first();
            return $role->type;
        }
        return 'all'; 
    }
}
