<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $brands = Brand::latest()->get();

        return view('backend.brand.create', compact('brands'));
    }

    public function store(StoreBrandRequest $request)
    {
        $image = $request->file('brand_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug' => strtolower(str_replace(' ', '-', $request->name_en)),
            'brand_photo_path' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand_id = $brand->id;
        $old_img = $request->old_image;

        if ($request->file('brand_photo_path')) {

            unlink($old_img);
            $image = $request->file('brand_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'name_ja' => $request->name_ja,
                'name_en' => $request->name_en,
                'slug' => strtolower(str_replace(' ', '-', $request->name_en)),
                'brand_photo_path' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('brand.create')->with($notification);
        } else {

            Brand::findOrFail($brand_id)->update([
                'name_ja' => $request->name_ja,
                'name_en' => $request->name_en,
                'slug' => strtolower(str_replace(' ', '-', $request->name_en)),
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('brand.create')->with($notification);
        } // end else 
    }

    public function destroy(Brand $brand)
    {
        $brand_id = $brand->id;
    	$img = $brand->brand_photo_path;
    	unlink($img);

    	Brand::findOrFail($brand_id)->delete();

    	 $notification = array(
			'message' => 'Brand Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
