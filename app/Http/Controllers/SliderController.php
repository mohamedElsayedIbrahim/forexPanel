<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = slider::orderBy('id','DESC')->paginate(15);
        $role = $this->getPermission('slider');
        return view('sliders.index', compact('sliders','role'));
    }

    public function create(){
        return view('sliders.create');
    }


    public function store(Request $request){

        $request->validate([
            'btn'=>'required|String|max:50',
            'logo'=>'required|image|mimes:jpeg,jpg,png,webp',
            'content'=>'required|String|max:200',
            'url'=>'required|url|max:250',
        ]);

        $image = $request->file('logo');
        $ext = $image->getClientOriginalExtension();
        $name= "sliders-".uniqid().".$ext";
        $image->move(public_path('uploads/slider'),$name);

        Slider::create([
            'btn_value'=>$request->btn,
            'image'=>$name,
            'link'=>$request->url,
            'content'=>$request->content
        ]);

        return redirect(route('sliders.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $slider = Slider::findOrfail($id);
        return view('sliders.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'btn'=>'required|String|max:50',
                'logo'=>'nullable|image|mimes:jpeg,jpg,png,webp',
                'content'=>'required|String|max:200',
                'url'=>'required|url|max:250',
            ]);
        $Slider = Slider::findOrFail($id);
        
        $Contentimage = $Slider->image;

        if(!empty($request->file('logo'))){
            $Contentimage = $request->file('logo');
            $ext = $Contentimage->getClientOriginalExtension();
            $Contentimagename= "sliders-".uniqid().".$ext";
            $Contentimage->move(public_path('uploads/slider'),$Contentimagename);
            $Contentimage = $Contentimagename;
            unlink(public_path('uploads/slider/'). $Slider->image);
        }

        $Slider->update([
            'btn_value'=>$request->btn,
            'image'=>$Contentimage,
            'link'=>$request->url,
            'content'=>$request->content
        ]);

        return Redirect::route('sliders.index')->with('message', 'Your slide has been Updated successfully');
    }


    public function destroy($id)
    {
        $Slider = Slider::findOrFail($id);

        if($Slider->image !== null){
            unlink(public_path('uploads/slider/'). $Slider->image);
        }
        
        $Slider->delete();
        return Redirect::route('sliders.index')->with('message', 'Your slide has been Deleted successfully');
    }
}
