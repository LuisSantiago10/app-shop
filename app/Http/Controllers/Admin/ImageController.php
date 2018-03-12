<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
 	public function index($id){
 		
 		$product = Product::find($id);
 		$images = $product->images;
 		return view('admin.products.images.index')->with(compact('product','images'));

 	}
 	public function store(Request $request, $id){

 		//guardar la imagen en el proyecto
 		$file = $request->file('photo');
 		$path = public_path() . '/images/products';
 		$fileName = uniqid() . $file->getClientOriginalName();
 		$file->move($path,$fileName);

 		//crear un registro en la tabla
 		$productImage = new ProductImage();
 		$productImage->image = $fileName;
 		//$productImage->featured = ;
 		$productImage->product_id = $id;
 		$productImage->save();

 		return back();

 	}
 	public function destroy(){
 		
 	}   
 }
