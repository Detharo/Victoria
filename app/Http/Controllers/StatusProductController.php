<?php

namespace App\Http\Controllers;

use App\StatusProduct;
use Illuminate\Http\Request;
use PHPUnit\Util\Type;

class StatusProductController extends Controller
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
        $StatusProduct = StatusProduct::all();
        return view('home.status',compact('StatusProduct'));

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
        $StatusProduct = new StatusProduct();
        // ($product->name) = ES EL ATRIBUTO DE LA BDD
        // ($request->name) = VIENE DEL FORMULARIO VISTA
        $StatusProduct->STS_description = $request-> STS_description;
        $StatusProduct->save();
        //redirección<

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusProduct  $StatusProduct
     * @return \Illuminate\Http\Response
     */
    public function show(StatusProduct $StatusProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusProduct  $StatusProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusProduct $StatusProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusProduct  $StatusProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusProduct $StatusProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusProduct  $StatusProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusProduct $StatusProduct)
    {
        //
    }
}
