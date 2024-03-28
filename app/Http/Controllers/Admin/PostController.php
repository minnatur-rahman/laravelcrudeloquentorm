<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\support\Str;
use DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //___create method___//
    public function create()
    {
        $category = Category::all();
        return view('admin/post/create', compact('category'));
    }

    //___store method___//
    public function store(Request $request)
    {

    }


}
