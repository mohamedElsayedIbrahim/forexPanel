<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class ApiPermissionController extends Controller
{
    public function get_permission()
    {
        $permissions = Permission::select('id','nameScreen')->get();
        return response()->json($permissions);
    }
}
