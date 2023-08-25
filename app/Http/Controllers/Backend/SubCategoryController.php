<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name_ja','ASC')->get();
        $subCategories = SubCategory::latest()->get();

        return view('backend.subcategory.create', compact('categories', 'subCategories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        SubCategory::create([
            'category_id' => $request->category_id,
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug' => strtolower(str_replace(' ', '-',$request->name_en)),
        ]);

        $notification = array(
			'message' => 'SubCategory Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::orderBy('name_ja','ASC')->get();

        return view('backend.subcategory.edit', compact('categories', 'subCategory'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory_id = $subCategory->id;

        SubCategory::findOrFail($subCategory_id)->update([
       'category_id' => $request->category_id,
       'name_ja' => $request->name_ja,
       'name_en' => $request->name_en,
       'slug' => strtolower(str_replace(' ', '-',$request->name_en)),
       ]);

       $notification = array(
           'message' => 'SubCategory Updated Successfully',
           'alert-type' => 'info'
       );

       return redirect()->route('subCategory.create')->with($notification);
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory_id = $subCategory->id;

        SubCategory::findOrFail($subCategory_id)->delete();

        $notification = array(
			'message' => 'SubCategory Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}
