<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function panel()
    {
        $user = Auth::user();
        $userPermission = DB::table('users')
            ->join('permission_user','users.id','=','permission_user.user_id')
            ->join('permissions','permission_user.permission_id','=','permissions.id')
            ->select('permissions.nameScreen')->where('users.id','=',$user->id)
            ->get();
        $usertype = $user->type;
        return view("board",compact('userPermission','usertype'));
    }
}
