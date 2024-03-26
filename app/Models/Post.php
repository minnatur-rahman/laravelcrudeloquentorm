<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','subcategory_id', 'title', 'slug', 'post_date', 'description', 'image',
    ];

    //___join with category___//
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); //category_id
    }

    //___join with subcategory___//
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id'); //category_id
    }

}
