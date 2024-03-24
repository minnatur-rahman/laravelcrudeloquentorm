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
        $data = DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')
        ->select('categories.category_name','subcategories.*')->get();
        return response()->json($data);
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
}
