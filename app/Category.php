<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    Public function products(){
    	return $this->hasMany(Product::class);
    }
}
