<?php


namespace App\Http\Controllers;


use App\Models\Massage;
use Illuminate\Http\Request;

class MassageController extends Controller
{
public static function massage(Request $request)
{
    Massage::create(['massage' => $request->massage]);


    return redirect()->back();
}
}
