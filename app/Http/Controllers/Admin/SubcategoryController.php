<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use DB;

class SubcategoryController extends Controller
{
    //___subcategory index___//
     public function index()
     {
        // $data = DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')
        // ->select('categories.category_name','subcategories.*')->get();
        $data = Subcategory::all();
        return view('admin/subcategory/index',compact('data'));
     }
    //___create method___//
     public function create()
     {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
     }

    //___store method___..
     public function store(Request $request)
     {
       $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',

        ]);


        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        // Subcategory::insert([
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        // ]);

        toastr()->success('Subcategory has been saved successfully!', 'Congrats', ['timeOut' => 4000]);

        return redirect()->back();
     }

     //___destroy method____//
     public function destroy($id)
     {
        Subcategory::destroy($id);

        toastr()->success('Category has been delete successfully!', 'Congrats', ['timeOut' => 2000]);
        return redirect()->back()->with('message', 'SubCategory Delete Successfully !');

     }

     //___edit method___//
     public function edit()
     {
        $categories=Category::all();
        $data=Subcategory::find();
        return view('admin/subcategory/edit',compact('categories','data'));
     }

     //___subcategory update___//
     public function update(Request $request, $id)
     {
        $category = Category::find($id); //get the record

        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);


        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        toastr()->success('Category has been updated successfully!', 'Congrats', ['timeOut' => 2000]);
        return redirect()->route('category.index');
     }
}
