<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);

        $image = $request->file('thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $name_gen);
        $save_url = 'upload/product/thumbnail/' . $name_gen;

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug' =>  strtolower(str_replace(' ', '-', $request->name_en)),
            'code' => $request->code,
            'qty' => $request->qty,
            'tag_ja' => $request->tag_ja,
            'tag_en' => $request->tag_en,
            'size' => $request->size,
            'color_ja' => $request->color_ja,
            'color_en' => $request->color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'thumbnail' => $save_url,
            'short_description_ja' => $request->short_description_ja,
            'short_description_en' => $request->short_description_en,
            'long_description_ja' => $request->long_description_ja,
            'long_description_en' => $request->long_description_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
        ]);

        $product_id = $product->id;

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/product/multi-image/' . $make_name);
            $uploadPath = 'upload/product/multi-image/' . $make_name;

            ProductImage::create([
                'product_id' => $product_id,
                'name' => $uploadPath,
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $product_id = $product->id;

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $subSubCategories = SubSubCategory::latest()->get();

        $multiImages = ProductImage::where('product_id', $product_id)->get();

        return view('backend.product.edit', compact('product', 'brands', 'categories', 'subCategories', 'subSubCategories', 'multiImages'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product_id = $product->id;
        $old_img = $request->old_image;
        unlink($old_img);

        $image = $request->file('thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $name_gen);
        $save_url = 'upload/product/thumbnail/' . $name_gen;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug' =>  strtolower(str_replace(' ', '-', $request->name_en)),
            'code' => $request->code,
            'qty' => $request->qty,
            'tag_ja' => $request->tag_ja,
            'tag_en' => $request->tag_en,
            'size' => $request->size,
            'color_ja' => $request->color_ja,
            'color_en' => $request->color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'thumbnail' => $save_url,
            'short_description_ja' => $request->short_description_ja,
            'short_description_en' => $request->short_description_en,
            'long_description_ja' => $request->long_description_ja,
            'long_description_en' => $request->long_description_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);
    }

    // Multi Image
    public function multiImageUpdate(Request $request)
    {
        $images = $request->multi_img;

        foreach ($images as $id => $image) {
            $imageDel = ProductImage::findOrFail($id);
            unlink($imageDel->name);

            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/product/multi-image/' . $make_name);
            $uploadPath = 'upload/product/multi-image/' . $make_name;

            ProductImage::where('id', $id)->update([
                'name' => $uploadPath,
            ]);
        }

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);
    }

    public function multiImageDestroy($id)
    {
        $oldimg = ProductImage::findOrFail($id);
        unlink($oldimg->name);

        ProductImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy(Product $product)
    {
        $product_id = $product->id;
        unlink($product->thumbnail);

        Product::findOrFail($product_id)->delete();

        $images = ProductImage::where('product_id', $product_id)->get();

        foreach ($images as $img) {
            unlink($img->photo_name);
            ProductImage::where('product_id', $product_id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
