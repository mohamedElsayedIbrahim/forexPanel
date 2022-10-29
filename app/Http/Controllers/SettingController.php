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
        $role = $this->getPermission('about');   
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
