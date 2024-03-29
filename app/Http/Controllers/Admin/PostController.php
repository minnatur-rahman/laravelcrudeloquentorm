<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Faker\Core\File as CoreFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //___index_method___//
    public function index()
    {
        $posts=Post::all();
        return view('admin.post.index', compact('posts'));
    }

    //___create method___//
    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }

    //___store method___//
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $category=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=str::of($request->title)->slug('-');

        $data=array();
        $data['category_id']=$category;
        $data['subcategory_id']=$request->subcategory_id;
        $data['title']=$request->title;
        $data['slug']= $slug;
        $data['post_date']=$request->post_date;
        $data['tags']=$request->tags;
        $data['description']=$request->description;
        $data['user_id']=Auth::id();
        $data['status']=$request->status;
        $photo=$request->image;
        if ($photo) {
            $photoName=$slug.'.'.$photo->getClientOriginalExtension(); //   slug.png
            Image::make($photo)->resize(600,360)->save('media/'.$photoName);
            $data['image']='media/'.$photoName;
            DB::table('posts')->insert($data);
          toastr()->success('Post has been saved successfully!', 'Congrats', ['timeOut' => 4000]);
          return redirect()->back();
        }
        //___with out any photo___//
          DB::table('posts')->insert($data);
          toastr()->success('Post has been saved successfully!', 'Congrats', ['timeOut' => 4000]) ;
          return redirect()->back();

    }

    //___delete_method___//
    public function destroy($id)
    {
         $post=Post::find($id);
         if(File::exists($post->image)){
         File::delete($post->image);
        }
         $post->delete();
         toastr()->success('Post has been delete successfully!', 'Congrats', ['timeOut' => 4000]) ;
         return redirect()->back()->with('message', 'Post Delete Successfully !');

    }

}
