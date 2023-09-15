<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    //use $fillable for storing only that field which is specified in the fillable array.
    protected $table = 'products';
    protected $fillable = ['title','quantity','description','keywords','category','image','marked_price','discount','price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
