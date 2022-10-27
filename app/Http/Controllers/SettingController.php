<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function about()
    {
        $data = Setting::where('type','=','about')->first();
        $user = Auth::user();
        if($user->type != 'superadmin'){
            $permission_id = Permission::select('id')->where('nameScreen','=','permission')->first();
        $role = DB::table('permission_user')
            ->select('permission_user.type')->where('user_id','=',$user->id)->where('permission_id','=',$permission_id->id)
            ->first();
        $role = $role->type;
        return view('settings.about',compact('data','role'));
        }
        $role = 'all';    
        return view('settings.about',compact('data','role'));
    }

    public function aboutUpdate(Request $request,$id)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $data = Setting::findOrFail($id);
        $data->update([
            'content'=> $request->content
        ]);

        return redirect(route('about'))->with('message','Your page has been updated successfully');
    }
}
