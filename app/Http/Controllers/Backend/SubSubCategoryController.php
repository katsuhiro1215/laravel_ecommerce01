<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubSubCategoryRequest;
use App\Http\Requests\UpdateSubSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name_ja', 'ASC')->get();
        $subSubCategories = SubSubCategory::latest()->get();

        return view('backend.subSubCategory.create', compact('categories', 'subSubCategories'));
    }

    public function GetSubCategory($category_id)
    {
        $subCategory = SubCategory::where('category_id', $category_id)->orderBy('name_ja', 'ASC')->get();
        return json_encode($subCategory);
    }


    public function GetSubSubCategory($subCategory_id)
    {
        $subSubCategory = SubSubCategory::where('sub_category_id', $subCategory_id)->orderBy('name_ja', 'ASC')->get();
        return json_encode($subSubCategory);
    }


    public function store(StoreSubSubCategoryRequest $request)
    {
        SubSubCategory::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit(SubSubCategory $subSubCategory)
    {
        $subSubCategory_id = $subSubCategory->id;

        $categories = Category::orderBy('name_ja', 'ASC')->get();
        $subCategories = SubCategory::orderBy('name_ja', 'ASC')->get();
        $subSubCategories = SubSubCategory::findOrFail($subSubCategory_id);

        return view('backend.subsubcategory.edit', compact('categories', 'subCategories', 'subSubCategory', 'subSubCategories'));
    }

    public function update(UpdateSubSubCategoryRequest $request, SubSubCategory $subSubCategory)
    {
        $subSubCategory_id = $subSubCategory->id;

        SubSubCategory::findOrFail($subSubCategory_id)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('subSubCategory.create')->with($notification);
    }

    public function destroy(SubSubCategory $subSubCategory)
    {
        $subSubCategory_id = $subSubCategory->id;

        SubSubCategory::findOrFail($subSubCategory_id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
