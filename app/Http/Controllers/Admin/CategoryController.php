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

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

    }

}
