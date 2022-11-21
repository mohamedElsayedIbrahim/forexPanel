<?php

namespace App\Http\Controllers;

use App\Broker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrokerController extends Controller
{
    public function index()
    {
        $brokers = Broker::orderBy('id','DESC')->paginate(15);
        $role = $this->getPermission('broker');
        return view('brokers.index', compact('brokers','role'));
    }

    public function create(){
        return view('brokers.create');
    }


    public function store(Request $request){

        $request->validate([
            'title'=>'required|String|unique:brokers,title|max:100',
            'logo'=>'required|image|mimes:jpeg,jpg,png,webp',
            'content'=>'required|String|max:300',
        ]);

        $image = $request->file('logo');
        $ext = $image->getClientOriginalExtension();
        $name= "broker-".uniqid().".$ext";
        $image->move(public_path('uploads/broker'),$name);

        Broker::create([
            'title'=>$request->title,
            'logo'=>$name,
            'content'=>$request->content
        ]);

        return redirect(route('broker.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $broker = Broker::findOrfail($id);
        return view('brokers.edit', compact('broker'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'=>'required|String|max:100',
                'logo'=>'nullable|image|mimes:jpeg,jpg,png,webp',
                'content'=>'required|String|max:300',
            ]);
        $Broker = Broker::findOrFail($id);
        
        $Contentimage = $Broker->logo;

        if(!empty($request->file('logo'))){
            $Contentimage = $request->file('logo');
            $ext = $Contentimage->getClientOriginalExtension();
            $Contentimagename= "broker-".uniqid().".$ext";
            $Contentimage->move(public_path('uploads/broker'),$Contentimagename);
            $Contentimage = $Contentimagename;
            unlink(public_path('uploads/broker/'). $Broker->logo);
        }

        $Broker->update([
            'title'=>$request->title,
            'logo'=>$Contentimage,
            'content'=>$request->content
        ]);

        return Redirect::route('broker.index')->with('message', 'Your broker has been Updated successfully');
    }


    public function destroy($id)
    {
        $Broker = Broker::findOrFail($id);

        if($Broker->logo !== null){
            unlink(public_path('uploads/broker/'). $Broker->logo);
        }
        
        $Broker->delete();
        return Redirect::route('broker.index')->with('message', 'Your broker has been Deleted successfully');
    }
}
