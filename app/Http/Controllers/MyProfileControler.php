<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileControler extends Controller
{
    public static function profile()
    {
//        $users   =User::query()->get();
//        $user_data =User::query()->where('user_id', $users ->id)->get();
//        return view('my_profile',compact('user_data'));


        $user_data = Auth::user();
//        dd($user_data);
        return view('my_profile', compact('user_data'));
    }
    public function edit()
    {
        $user_data = Auth::user();
       return view('edit_profile', compact('user_data'));
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
                               'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                           ]);

        $user = auth()->user();

        // Save image
        $image = $request->file('profile_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded-files/user'), $imageName);

        // Update user profile
        $user->profile_image = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }



    public function update(Request $request)
    {

        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'User not authenticated.');
        }
        if ($request->has('profile_image')) {
            $image = $request->file('profile_image');
            $filename =  $image->getClientOriginalName();
//        dd($filename);

            $filePath = public_path('uploaded-files/user/' . $user->profile_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $image->move(public_path('uploaded-files/user'), $filename);
        }

         $user->update([
                        'name'=>$request->name ,
                        'email'=>$request->email ,
                        'phone'=>$request->phone ,
                        'address'=>$request->address ,
                        'profile_image'=>$filename ?? $user['profile_image'],
                        'gender' =>$request->gender ,
                    ]);

        return redirect()->route('profile');
    }
}




