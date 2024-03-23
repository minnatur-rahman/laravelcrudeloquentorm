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
    //___create method___//
    public function create(){
        $categories = Category::all();  // DB::table('categories')->get();
        return view('admin.subcategory.create', compact('categories'));
    }

    //___store method___..
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',

        ]);


        // $subcategory = new Subcategory;
        // $subcategory->subcategory_id = $request->category_id;
        // $subcategory->subcategory_name = $request->category_name;
        // $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        // $subcategory->save();

        Subcategory::insert([
            'subcategory_id' => $request->subcategory_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        ]);

        toastr()->success('Subcategory has been saved successfully!', 'Congrats', ['timeOut' => 4000]);

        return redirect()->back();
    }
}
