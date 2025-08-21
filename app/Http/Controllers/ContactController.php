<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public static function contact()
    {
        return view('contact us');
    }
}
