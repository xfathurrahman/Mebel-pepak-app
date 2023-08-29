<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    public function index()
    {
        $listcarousels['listcarousels'] = Carousel::Paginate(10)->onEachSide(2);
        return view('dashboard.admin.carousel.index')->with($listcarousels);
    }

    public function create()
    {
        return view('dashboard.admin.carousel.create');
    }

    public function store(Request $request)
    {
        $fileName = '';
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdhs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/carousel-image', $fileName);
        }
        Carousel::create(array_merge($request->all(),[
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'link_carousel' => $request->link_carousel,
            'image' => $fileName
        ]));
        return redirect('carousel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // Beralih dari index ke Edit Page
        $carousel = Carousel::find($id);
        return view('dashboard.admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::find($id);
        if($request -> hasFile('image'))
        {
            $path = 'public/carousel-image/'.$carousel->image;
            if (File::exists($path));
            {File::delete($path);}
            $file = $request ->file('image');
            $ext = $file->getClientOriginalName();
            $fileName = time().".".$ext;
            $file->storeAs('public/carousel-image/',$fileName);
            $carousel->image = $fileName;
        }
        $carousel->name = $request->input('name');
        $carousel->link_carousel = $request->input('link_carousel');
        $carousel->slug = Str::slug($carousel->name);
        $carousel->update();
        return redirect('carousel')->with('status', "Carousel $carousel->name berhasil di update");
    }

    public function destroy($id): RedirectResponse
    {
        $deletecarousel = Carousel::findOrFail($id);
        $deletecarousel->delete();
        return redirect('carousel');
    }

    public function deleteSelectedItem(Request $request): JsonResponse
    {
        $ids = $request->ids;
        Carousel::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Carousel Yang anda pilih berhasil dihapus!"]);
    }
}
