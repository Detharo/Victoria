<?php

namespace App\Http\Controllers;

use App\TypeProduct;
use Illuminate\Http\Request;
use PHPUnit\Util\Type;
use DB;
use Auth;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        if (Auth::user()->TUS_id == 1) {
            $TypeProduct = TypeProduct::all();
            return view('home.TypeProduct', compact('TypeProduct'));
        }
        else
        {
            return redirect()->back()->with('message', 'Permiso Denegado');
        }


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

        return redirect()->back()->with('message', 'Tipo Registrado Exitosamente');
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
    public function destroy($id)
    {

        DB::delete('delete from type_products where TPR_id = ?',[$id]) ;

        return redirect()->back()->with('message', 'Tipo Eliminado Exitosamente');


    }

}
