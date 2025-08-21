<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = "order_details";
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'total_price'];
    public static function getByDetails()
    {
        return self::query()->select(['order_id', 'product_id', 'quantity', 'price', 'total_price'])
                   ->get();

    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
