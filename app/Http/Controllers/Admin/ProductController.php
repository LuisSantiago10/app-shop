<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado de productos
    }
    public function create(){
    	return view('admin.products.create');// formulario de productos
    }
    public function store(Request $request){
           //validar
        $messages= [
            'name.required' => 'Es necesario colocar un nombre del productos',
            'name.min' => 'El producto tiene el precio minimo',

        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request, $rules,$messages);

    //Registrar el nuevo productos bd

        //dd($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();// inserta

        return redirect('/admin/products');

    }

    public function edit($id){
        
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));// formulario de productos

    }
    public function update(Request $request, $id){
        //validar
        $messages= [
            'name.required' => 'Es necesario colocar un nombre del productos',
            'name.min' => 'El producto tiene el precio minimo',

        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request, $rules,$messages);

        //Registrar el nuevo productos bd
        //dd($request->all());

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();// inserta

        return redirect('/admin/products');

    }
    public function destroy($id){
        //Registrar el nuevo productos bd

        //dd($request->all());

        $product = Product::find($id);
        $product->delete();// inserta

        return back();

    }
}
