<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $listcategories['listcategories'] = Category::Paginate(10)->onEachSide(2);
        return view('dashboard.admin.category.index')->with($listcategories);
    }

    public function create()
    {
        return view('dashboard.admin.category.create');
    }

    public function store(Request $request)
    {
        $fileName = '';
        // meyimpan di server
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdhs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/category-image', $fileName);
        }
        //menyimpan di db
        Category::create(array_merge($request->all(),[
            'slug' => Str::slug($request->name),
            'image' => $fileName
        ]));
        return redirect('category')->with('status', "Category berhasil di ditambah");
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('dashboard.admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request -> hasFile('image'))
        {
            $path = 'public/category-image/'.$category->image;
            if (File::exists($path));
            {
                File::delete($path);
            }
            $file = $request ->file('image');
            $ext = $file->getClientOriginalName();
            $fileName = time().".".$ext;
            $file->storeAs('public/category-image/',$fileName);
            $category->image = $fileName;
        }

        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name);
        $category->update();

        return redirect('category')->with('status', "Category $category->name berhasil di update");
    }

    public function destroy($id): RedirectResponse
    {
        $deletecategory = Category::findOrFail($id);
        $deletecategory->delete();
        return redirect('category');
    }

    public function deleteSelectedItem(Request $request): JsonResponse
    {
        $ids = $request->ids;
        Category::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Category Yang anda pilih berhasil dihapus!"]);
    }

    public function show($id)
    {
        //
    }

}
