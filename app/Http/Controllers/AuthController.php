<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;
use function PHPUnit\Runner\validate;

class AuthController extends Controller
{
    public static function getRegister()
    {

        return view('register');
    }

    public static function register(Request $request)
    {

        $validatedData = $request->validate([
                    'name'          => 'required|string|min:4',
                    'email'         => 'required|email|unique:users,email',
                    'password'      => 'required|string|min:4',
                    'phone'         => 'required|numeric',
                    'address'       => 'required|string',
                    'gender'        => 'required|in:male,female',
                    'profile_image' => 'nullable|image',
                ]);


        $filename = null;

    if ($request->has('profile_image')) {
        $image = $request->file('profile_image');
        $filename =  $image->getClientOriginalName();
//        dd($filename);
        $image->move(public_path('uploaded-files/user'), $filename);
    }

        $user =  User::create([
                    'name'=>$validatedData['name'],
                    'email'=>$validatedData['email'],
                    'password'=>$validatedData['password'],
                    'phone'=>$validatedData['phone'],
                    'address'=>$validatedData['address'],
                    'profile_image'=>$filename ?? null,
                    'gender' =>$validatedData['gender'],
         ]);
                  return view('login');
    }


    public static function login()
    {
        return view('login');
    }


    public function getLogin(Request $request)
    {

        $credentials  = $request->validate([
                                        'email'         => 'required|email',
                                        'password'      => 'required|string|min:4',
                                    ]);


        $auth= Auth::attempt($credentials); // auth()
        if (!$auth){
           return back()->with('error', 'Invalid email or password');
        }
        return view('home');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        // Redirect to login or homepage
        return redirect()->route('login'); // Or any route you want
    }




}
