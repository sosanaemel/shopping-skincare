<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\result;

class SearchController extends Controller
{
    public static function searchByProduct(Request $request)
    {
        $search_index = $request->message ;
        $results = null;
        if($request->message == null)
        {
            $no_products_found= true;
        }
        else{
            $results = Product::query()
                              ->where('name', 'LIKE', '%' . $search_index . '%')
                              ->get();

            if(count($results)==0)
            {
                $no_products_found= true;

            }
            else{
                $no_products_found= false;

            }


        }

        return view('search', compact(['results', 'search_index' ,'no_products_found']));

//
    }
}
