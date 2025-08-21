<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $categories = Category::select('id', 'name')->get();

        $query = Product::query();

           if ($request->ajax()) {
               if ($request->has('categories')){
                   $query->whereIn('category_id', $request->categories);
                   $products = $query->get();
               }else{
                   $products = $query->get();
               }

                $html = view('filter_results', compact('products'))->render();
                return response()->json(['html' => $html]);
            }

        $products = $query->get();
        return view('products', compact('products', 'categories'));
    }



}
