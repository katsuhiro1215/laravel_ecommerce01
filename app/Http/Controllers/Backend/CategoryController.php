<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();

    	return view('backend.category.create',compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug_en' => strtolower(str_replace(' ', '-',$request->name_en)),
            'icon' => $request->icon,
        ]);

        $notification = array(
			'message' => 'Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category_id = $category->id;

        Category::findOrFail($category_id)->update([
            'name_ja' => $request->name_ja,
            'name_en' => $request->name_en,
            'slug_en' => strtolower(str_replace(' ', '-',$request->name_en)),
            'icon' => $request->icon,
        ]);

        $notification = array(
			'message' => 'Category Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('category.create')->with($notification);
    }

    public function destroy(Category $category)
    {
        $category_id = $category->id;

        Category::findOrFail($category_id)->delete();

        $notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}
