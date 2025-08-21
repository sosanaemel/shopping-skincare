<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "order";

    protected $fillable = ['cart_total', 'reference_number', 'user_id'];

    public static function getByOrder($cart_total)
    {
        return self::where('cart_total',$cart_total)->get()->first();
    }


    public function details()
    {
        return $this->hasMany(Details::class, 'order_id');
    }

    public function order()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
