<?php

namespace App\Http\Controllers;

use App\Adverticer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdverticerController extends Controller
{
    public function index()
    {
        $adverticers = Adverticer::orderBy('id','DESC')->paginate(15);
        $role = $this->getPermission('adverticer');
        return view('adverticers.index', compact('adverticers','role'));
    }

    public function create(){
        return view('adverticers.create');
    }


    public function store(Request $request){

        $request->validate([
            'posation'=>'required|String|max:100',
            'poster'=>'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        $image = $request->file('poster');
        $ext = $image->getClientOriginalExtension();
        $name= "adverticers-".uniqid().".$ext";
        $image->move(public_path('uploads/adverticers'),$name);

        Adverticer::create([
            'posation'=>$request->posation,
            'poster'=>$name,
            
        ]);

        return redirect(route('adverticers.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $adverticer = Adverticer::findOrfail($id);
        return view('adverticers.edit', compact('adverticer'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'posation'=>'required|String|max:100',
                'poster'=>'nullable|image|mimes:jpeg,jpg,png,webp',
            ]);
        $adverticer = Adverticer::findOrFail($id);
        
        $Contentimage = $adverticer->poster;

        if(!empty($request->file('poster'))){
            $Contentimage = $request->file('poster');
            $ext = $Contentimage->getClientOriginalExtension();
            $Contentimagename= "adverticers-".uniqid().".$ext";
            $Contentimage->move(public_path('uploads/adverticers'),$Contentimagename);
            $Contentimage = $Contentimagename;
            unlink(public_path('uploads/adverticers/'). $adverticer->poster);
        }

        $adverticer->update([
            'posation'=>$request->posation,
            'poster'=>$Contentimage,
        ]);

        return Redirect::route('adverticers.index')->with('message', 'Your adverticer has been Updated successfully');
    }


    public function destroy($id)
    {
        $adverticer = Adverticer::findOrFail($id);

        if($adverticer->poster !== null){
            unlink(public_path('uploads/adverticers/'). $adverticer->poster);
        }
        
        $adverticer->delete();
        return Redirect::route('adverticers.index')->with('message', 'Your adverticer has been Deleted successfully');
    }
}
