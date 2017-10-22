<?php

namespace App\Http\Controllers;

use App\Product;
use App\StatusProduct;
use App\TypeProduct;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.ingress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $this->validate($request,[
           'name' => 'required|string',
           'brand' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'cod_product' => 'required|string',
            'des_product' => 'required|string',
        ]);
        //almacenamiento
        $product = new Product();
        // ($product->name) = ES EL ATRIBUTO DE LA BDD
        // ($request->name) = VIENE DEL FORMULARIO VISTA
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->type_product = $request->type_product;
        $product->cod_product = $request-> cod_product;
        $product->des_product = $request->des_product;
        $product->cod_status = $request->cod_status;
        $product->save();
        //redirección
        return 'Se ha ingresado el producto';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
