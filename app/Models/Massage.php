<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    use HasFactory;

    protected $table = "massages";

    protected $fillable = ['massage'];
    public static function getByMassage($message)
    {
        return self::where('massage',$message)->get();
    }


}
