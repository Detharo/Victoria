<?php

namespace App\Http\Controllers;

use App\TypeProduct;
use Illuminate\Http\Request;
use PHPUnit\Util\Type;

class TypeProductController extends Controller
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
        $TypeProduct = TypeProduct::all();
        return view('home.TypeProduct',compact('TypeProduct'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $TypeProduct = new TypeProduct();
        // ($product->name) = ES EL ATRIBUTO DE LA BDD
        // ($request->name) = VIENE DEL FORMULARIO VISTA
        $TypeProduct->TPR_description = $request-> TPR_description;
        $TypeProduct->save();
        //redirección<

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduct $typeProduct)
    {
        //
    }
}
