<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
