<?php

namespace App\Http\Controllers;

use App\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticalController extends Controller
{
    public function index()
    {
        $articals = Artical::orderBy('id','DESC')->paginate(15);
        $role = $this->getPermission('artical');
        return view('articals.index', compact('articals','role'));
    }

    public function create(){
        return view('articals.create');
    }


    public function store(Request $request){

        $request->validate([
            'title'=>'required|String|unique:articals,title|max:100',
            'content'=>'required|String',
            'keywords'=>'nullable|String|max:200',
            'desc'=>'nullable|String|max:150',
            'poster'=>'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        $image = $request->file('poster');
        $ext = $image->getClientOriginalExtension();
        $name= "articals-".uniqid().".$ext";
        $image->move(public_path('uploads/articals'),$name);

        Artical::create([
            'title'=>$request->title,
            'conent'=>$request->content,
            'keywords'=>$request->keywords,
            'description'=>$request->desc,
            'poster'=>$name,
            
        ]);

        return redirect(route('articals.index'))->with("message","successfuly Added");
    }

    public function edit($id)
    {
        $artical = Artical::findOrfail($id);
        return view('articals.edit', compact('artical'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'=>'required|String|max:100',
                'content'=>'required|String',
                'keywords'=>'nullable|String|max:200',
                'desc'=>'nullable|String|max:150',
                'poster'=>'nullable|image|mimes:jpeg,jpg,png,webp',
            ]);
        $artical = Artical::findOrFail($id);
        
        $Contentimage = $artical->poster;

        if(!empty($request->file('Contentimage'))){
            $Contentimage = $request->file('Contentimage');
            $ext = $Contentimage->getClientOriginalExtension();
            $Contentimagename= "articals-".uniqid().".$ext";
            $Contentimage->move(public_path('uploads/articals'),$Contentimagename);
            $Contentimage = $Contentimagename;
            unlink(public_path('uploads/articals/'). $artical->poster);
        }

        $artical->update([
            'title'=>$request->title,
            'conent'=>$request->content,
            'keywords'=>$request->keywords,
            'description'=>$request->desc,
            'poster'=>$Contentimage,
        ]);

        return Redirect::route('articals.index')->with('message', 'Your post is Updated successfully');
    }


    public function destroy($id)
    {
        $artical = Artical::findOrFail($id);

        if($artical->poster !== null){
            unlink(public_path('uploads/posts/'). $artical->poster);
        }
        
        $artical->delete();
        return Redirect::route('articals.index')->with('message', 'Your post is Deleted successfully');
    }
}
