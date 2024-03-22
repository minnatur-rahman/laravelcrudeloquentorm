<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    //___create method___//
    public function create(){
        $categories = Category::all();  // DB::table('categories')->get();
        return view('admin.subcategory.create', compact('categories'));
    }
}
