<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $admin = Admin::find(1);

        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find(1);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$admin->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $admin['profile_photo_path'] = $filename;
        }

        $admin->save();

        $notification = array(
			'message' => 'Admin Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('admin.profile.edit')->with($notification);
    }

    public function passwordEdit()
    {
        return view('admin.password.edit');
    }

    public function passwordUpdate(Request $request)
    {
        $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Admin::find(1)->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$admin = Admin::find(1);
			$admin->password = Hash::make($request->password);
			$admin->save();
			Auth::logout();
			return redirect()->route('admin.logout');
		}else{
			return redirect()->back();
		}

    }
}
