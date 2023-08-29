<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;

class HomepageController extends Controller
{

    // Menampilkan Tombol untuk navigasi pelanggan ke dashboard

    public function index()
    {
        $listproducts['listproducts'] = Product::with('users','images')
            ->orderBy('created_at', 'DESC')
            ->get();
        $listcategories['listcategories'] = Category::orderBy('id', 'asc')
            ->get();
        $listcarousels['listcarousels'] = Carousel::get();

        return view('layouts.homepage')
            ->with($listproducts)
            ->with($listcategories)
            ->with($listcarousels);
    }
}
