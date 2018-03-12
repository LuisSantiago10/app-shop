<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->category
    Public function category(){
    	return $this->belongsTo(Category::class);
    }
    //$product->images
    Public function images(){
    	return $this->hasMany(ProductImage::class);
    }
}
