<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = [];

    public $timestamps = false;

    public static function getById($id)
     {
         return self::where('id',$id)->get()->first();
     }


    public static function getProducts()
    {
        return self::query()->select(['id', 'name', 'price', 'quantity', 'image'])
                   ->get();
     }

}
