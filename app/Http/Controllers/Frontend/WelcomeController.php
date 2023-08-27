<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $heros = Hero::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $categories = Category::orderBy('name_ja', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.index', compact('heros', 'categories', 'products', 'hot_deals', 'featured', 'special_offer', 'special_deals'));
    }

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $multiImages = ProductImage::where('product_id', $id)->get();

        $color_en = $product->color_en;
        $product_color_en = explode(',', $color_en);

        $color_ja = $product->color_hin;
        $product_color_ja = explode(',', $color_ja);

        $sizes = $product->size;
        $product_size = explode(',', $sizes);

        return view('frontend.product.product_details', compact('product', 'hot_deals', 'featured', 'special_offer', 'special_deals', 'multiImages', 'product_color_en', 'product_color_ja', 'product_size'));
    }

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('tag_en', $tag)->where('tag_ja', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('frontend.tags.tags', compact('products', 'categories'));
    }

    public function SubCategoryWiseProduct(Request $request, $subCategory_id, $slug)
    {
        $products = Product::where('status', 1)->where('sub_category_id', $subCategory_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('name_en', 'ASC')->get();
        
        $subCategories = SubCategory::with(['category'])->where('id', $subCategory_id)->get();

        if ($request->ajax()) {
            $grid_view = view('frontend.product.grid', compact('products'))->reader();
            $list_view = view('frontend.product.list', compact('products'))->reader();

            return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
        }

        return view('frontend.product.subCategory', compact('products', 'categories', 'subSubCategories'));
    }
}
