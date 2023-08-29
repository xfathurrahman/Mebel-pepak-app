<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $listproducts['listproducts'] = Product::with('categories','images','users')
            ->Paginate(10)
            ->onEachSide(2);

        return view('dashboard.admin.products.index')->with($listproducts);
    }

    public function create()
    {
        $listcategories['listcategories'] = Category::get();
        return view('dashboard.admin.products.create')->with($listcategories);
    }

    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name'=>'required|string',
            'category_id'=>'required',
            'quantity'=>'required',
            'description'=>'required|string',
            'files' => 'required',
        ])->validate();
        $name=$request->name;
        $price=$request->price;
        $category_id=$request->category_id;
        $description=$request->description;
        $quantity=$request->quantity;
        $product  = new Product;
        $product -> name=$name;
        $product -> price=$price;
        $product -> category_id=$category_id;
        $product -> description=$description;
        $product -> quantity=$quantity;
        $product -> user_id=Auth::user()->id;
        $product -> save();
        $productId=$product->id;
        if ($request->hasfile('files')) {
            $files = $request->file('files');
            foreach($files as $file) {
                $image  = new Image;
                $name   = time().'.'.$file->getClientOriginalName();
                $path   = public_path('/storage/product-image');
                $file  -> move($path, $name);
                $image -> product_id=$productId;
                $image -> image_path=$name;
                $image -> save();
            }
        return redirect('/products')->with("status", "Produk berhasi ditambahkan");
        }
    }

    public function productListAjax()
    {
        $products = Product::select('name')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request-> product_name;


        if ($searched_product != "")
        {
            $product = Product::where("name","LIKE", "%$searched_product%" )->first();
            if ($product)
            {
                return redirect('detail/'.$product->id.'/'.$product->categories->slug);
            }
            else
            {
                return redirect()->back()->with("status", "Tidak ada produk yang cocok dengan pencarianmu.");
            }
        }
        else
        {
            return redirect()->back();
        }

    }

    public function destroy($id): RedirectResponse
    {
        $deleteads = Product::findOrFail($id);
        $deleteads->delete();
        return redirect('products');
    }

    public function deleteSelectedItem(Request $request)
    {
        $ids = $request->ids;
        Product::whereIn('id', $ids)->delete();
    }

    public function edit($id)
    {
        $listcategories = Category::get();
        $products = Product::with(['users','categories','images'])->find($id);

        return view('dashboard.admin.products.edit', compact('products','listcategories'));
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name'=>'required|string',
            'category_id'=>'required',
            'quantity'=>'required',
            'description'=>'required|string',
        ])->validate();
        $name=$request->name;
        $price=$request->price;
        $category_id=$request->category_id;
        $description=$request->description;
        $quantity=$request->quantity;
        $product = Product::find($id);

        // nambah foto baru
        if ($request->hasfile('files')) {
            // hapus image_path dari DB
            $imagedel = Image::with('products')->where('product_id', $product->id);
            $imagedel ->delete();

            $files = $request->file('files');
            foreach ($files as $file) {
                $image = new Image();
                $image_name = time() . '.' . $file->getClientOriginalName();
                $path = public_path('/storage/product-image');
                $file->move($path, $image_name);
                $image->product_id = $product->id;
                $image->image_path = $image_name;
                $image->save();
            }
        }
        $product -> name = $name;
        $product -> price = $price;
        $product -> category_id = $category_id;
        $product -> description = $description;
        $product -> quantity = $quantity;
        $product -> user_id = Auth::user()->id;
        $product->update();
        return redirect('products')->with('status', "Product $product->name berhasil di update");
    }
}
