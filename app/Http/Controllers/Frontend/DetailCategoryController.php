<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DetailCategoryController extends Controller
{
    public function index($slug)
    {
        if (Category::where('slug',$slug)->exists())
        {
            $cate = Category::where('slug', $slug)->first();
            $product = Product::where('category_id',$cate->id)->get();
            return view('layouts.detail_category', compact('product','cate'));
        }
        else
        {
            return redirect('/')->with('status','Slug tidak ditemukan');
        }
    }
}
