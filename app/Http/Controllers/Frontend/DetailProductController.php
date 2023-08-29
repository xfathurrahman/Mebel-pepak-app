<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

class DetailProductController extends Controller
{
    public function index($id,$slug)
    {
        $details['details'] = Product::with(['users','categories','images'])
            ->find($id);
        $product = Product::find($id);
        $images['images'] = Image::where('product_id',$product->id)
            ->orderBy('id','asc')
            ->get();
        $imagesthumb['imagesthumb'] = Image::where('product_id',$product->id)
            ->orderBy('id','asc')
            ->first();
        $related_product['related_product'] = Product::with('categories')
            ->where('category_id', $product -> categories -> id)
            ->get();

        return view('layouts.detail_product')
            ->with($details)
            ->with($images)
            ->with($imagesthumb)
            ->with($related_product);
    }
}
