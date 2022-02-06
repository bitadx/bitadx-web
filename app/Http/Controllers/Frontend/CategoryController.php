<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        $categories = Category::where('status','1')->get();

        return view('frontend.category.categories',compact('categories'));
    }

    public function categoryBySlug($slug){
        $category = Category::where('slug',$slug)->first();

        $categories = Category::where('status','1')->get();

        return view('frontend.category.category',compact('category','categories'));
    }
}
