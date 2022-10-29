<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id','DESC')->paginate(10);
        $role = $this->getPermission('permission');
        return view('permissions.index', compact('permissions','role'));
    }

    public function create(){
        return view('permissions.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|String|unique:permissions,nameScreen|max:100',
            
        ]);

        Permission::create([
            'nameScreen'=>$request->name,
        ]);

        return redirect(route('permissions.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $permission = Permission::findOrfail($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request,$id)
    {
        $permission = Permission::findOrfail($id);

        $request->validate([
            'name'=>'required|String|unique:permissions,nameScreen|max:100',
            
        ]);


        $permission->update([
            'nameScreen'=>$request->name,
        ]);

        return redirect(route('permissions.index'))->with("message","successfuly updated");
    }

    public function destory($id)
    {
        $user = Permission::findOrfail($id);
        $user->delete();
        return redirect(route('permissions.index'))->with("message","successfuly Deleted");
    }
}
