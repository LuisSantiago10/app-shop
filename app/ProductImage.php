<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductImage extends Model
{
    //$ProductImage->category
    Public function product(){
    	return $this->belongsTo(Product::class);
    }
}
