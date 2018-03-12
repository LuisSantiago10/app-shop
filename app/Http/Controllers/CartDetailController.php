<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
   public function store(Request $request){

   	$CartDetail = new CartDetail();
   	$CartDetail->cart_id = auth()->user()->cart->id;
   	$CartDetail->product_id = $request->product_id;
   	$CartDetail->quantity = $request->quantity;
   	$CartDetail->save();

   	$notification = 'Producto agregado con exito!!!!!';
   	return back()->with(compact('notification'));

   }
}
