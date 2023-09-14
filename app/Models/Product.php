<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //use $fillable for storing only that field which is specified in the fillable array.
    protected $table = 'products';
    protected $fillable = ['title','quantity','description','keywords','category','image','marked_price','discount','price'];

}
