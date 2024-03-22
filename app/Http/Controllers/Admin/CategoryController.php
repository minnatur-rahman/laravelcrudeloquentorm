<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    //__index method__//
    public function index (){
        //__query builder__//
        $category = DB::table('categories')->get();

        //__eloquent__orm__//
        // $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    //__create method__//
    public function create(){
        return view('admin.category.create');
    }

    //__store method__//
    public function store(Request $request){

        $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ]);


        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::of($request->category_name)->slug('-');
        // $category->save();

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);

        toastr()->success('Category has been saved successfully!', 'Congrats', ['timeOut' => 2000]);

        return redirect()->back();

    }

    //__edit method__//
    public function edit($id){

        // $data = DB::table('categories')->where('id',$id)->first();
        // $data = Category::where('id',$id)->first();
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }

    //__data update method__//
    public function update(Request $request, $id){

        $category = Category::find($id); //get the record

        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);


        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        return redirect()->route('category.index');
    }

    //__destroy method__//
    public function destroy($id){
        // DB::table('categories')->where('id',$id)->delete();

        // $category = Category::find($id);
        // $category->delete();

        Category::destroy($id);

        // $notification = array('message' => 'Category Deleted Successfully !','alert-type' => 'success');
        return redirect()->back()->with('message', 'Category delete successfully !');
    }

}
