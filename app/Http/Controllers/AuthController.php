<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        $user = Auth::user();
        if($user->type != 'superadmin'){
            $permission_id = Permission::select('id')->where('nameScreen','=','users')->first();
        $role = DB::table('permission_user')
            ->select('permission_user.type')->where('user_id','=',$user->id)->where('permission_id','=',$permission_id->id)
            ->first();
        $role = $role->type;
        return view('users.index', compact('users','role'));
        }
        $role = 'all';
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
}
