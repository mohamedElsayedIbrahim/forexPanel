<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //

    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        $role = $this->getPermission('users');
        return view('users.index', compact('users','role'));
    }

    public function create(){
        $permissions = Permission::select('id','nameScreen')->get();
        return view('users.create',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|String|unique:users,name|max:100',
            'email'=>'nullable|email|max:100',
            'password'=>'required|min:6|max:50',
            'permissions'=>'nullable',
            'permissions.*'=>'exists:permissions,id',
            'roles'=>'nullable',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        foreach($request->permissions as $key=>$permission){
            $user->permissions()->attach($permission,['type'=>$request->roles[$key]]);
            echo $permission.'-'.$request->roles[$key];
        }

        return redirect(route('users.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $permissions = Permission::select('id','nameScreen')->get();
        $user = User::findOrfail($id);
        $userPermission = DB::table('users')
        ->join('permission_user','users.id','=','permission_user.user_id')->
        select('users.id','users.name','users.email','permission_user.user_id',
        'permission_user.permission_id','permission_user.type')->where('users.id','=',$id)
        ->get();
        $roles = ['all','write','delete','edit','read'];
        return view('users.edit', compact('user','permissions','userPermission','roles'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrfail($id);

        $request->validate([
            'name'=>'required|String|Exists:users,name|max:100',
            'email'=>'nullable|email|max:100',
            'password'=>'nullable|min:6|max:50',
            'permissions'=>'nullable',
            'permissions.*'=>'exists:permissions,id',
            'roles'=>'nullable',
        ]);

        $password = $user->password;
        
        if(!empty($request->password)){
            $password = Hash::make($request->password);
        }

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password
        ]);
        $user->permissions()->detach();
        foreach($request->permissions as $key=>$permission){
            $user->permissions()->attach($permission,['type'=>$request->roles[$key]]);
            echo $permission.'-'.$request->roles[$key];
        }

        return redirect(route('users.index'))->with("message","successfuly updated");
    }

    public function destory($id)
    {
        $user = User::findOrfail($id);
        $user->permissions()->detach();
        $user->delete();
        return redirect(route('users.index'))->with("message","successfuly Deleted");
    }

    public function login(Request $request)
    {
        $request->validate([
            'name'=>'required|String|max:100',
            'password'=>'required|min:6|max:50'
        ]);

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('panel')
                        ->withSuccess('Signed in');
        }
  
        return redirect(route('index'))->withErrors('Login details are not valid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'));
    }

    public function change_password(Request $request , $id)
    {
        
        $user = User::findOrfail($id);

        $request->validate([
            'new_pass'=>'nullable|min:6|max:50',
            're_new_pass'=>'nullable|min:6|max:50',
        ]);

        if(!empty($request->new_pass) && 
        ( Str::length($request->new_pass) == Str::length($request->re_new_pass) )
        && $request->new_pass == $request->re_new_pass
        ){
            $password = Hash::make($request->new_pass);
            $user->update([
                'password'=>$password
            ]);

            return back()->with('message','Your password has been updated successfully!');
        }

        return back()->withErrors(['paswwords are not match']);

    }
}
