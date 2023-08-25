<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Requests\UpdateHeroRequest;
use App\Models\Hero;
use Intervention\Image\ImageManagerStatic as Image;

class HeroController extends Controller
{
    public function create()
    {
        $heros = Hero::latest()->get();

        return view('backend.hero.create', compact('heros'));
    }

    public function store(StoreHeroRequest $request)
    {
        $image = $request->file('hero_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/hero/' . $name_gen);
        $save_url = 'upload/hero/' . $name_gen;

        hero::insert([
            'title' => $request->title,
            'description' => $request->description,
            'hero_photo_path' => $save_url,
        ]);

        $notification = array(
            'message' => 'hero Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit(Hero $hero)
    {
        return view('backend.hero.edit', compact('hero'));
    }

    public function update(UpdateHeroRequest $request, Hero $hero)
    {
        $hero_id = $hero->id;
        $old_img = $request->old_image;

        if ($request->file('hero_photo_path')) {

            unlink($old_img);
            $image = $request->file('hero_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/hero/' . $name_gen);
            $save_url = 'upload/hero/' . $name_gen;

            Hero::findOrFail($hero_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'hero_photo_path' => $save_url,
            ]);

            $notification = array(
                'message' => 'Hero Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('hero.create')->with($notification);
        } else {

            Hero::findOrFail($hero_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Hero Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('hero.create')->with($notification);
        }
    }

    public function destroy(Hero $hero)
    {
        $hero_id = $hero->id;
    	$img = $hero->hero_photo_path;
    	unlink($img);

    	Hero::findOrFail($hero_id)->delete();

    	 $notification = array(
			'message' => 'hero Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    public function HeroInactive($id)
    {
        Hero::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Hero Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function HeroActive($id)
    {
        Hero::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Hero Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
