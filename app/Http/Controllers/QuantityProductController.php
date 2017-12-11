<?php

namespace App\Http\Controllers;

use App\DecreaseProduct;
use App\OfferProduct;
use App\QuantityProduct;
use App\SoldProduct;
use App\StatusProduct;
use App\Product;
use App\TypeProduct;
use App\WeightProduct;
use Auth;
use Illuminate\Http\Request;

class QuantityProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->TUS_id == 1) {

            $product = Product::all();
            $statusProduct = StatusProduct::all();
            $offer = OfferProduct::all();
            $decrease = DecreaseProduct::all();
            $sold = SoldProduct::all();
            $typeProduct = TypeProduct::all();
            return view('product.stock', compact('product','statusProduct','typeProduct','offer','decrease','sold'));
        }
        else
        {
            return redirect()->back()->with('message', 'Permiso Denegado');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $prod = Product::all();
        $qty = new QuantityProduct();
        $qty->QTY_description = $request->QTY_description;


        //buscador de coincidencias entre el codigo del producto y su ID
        foreach ($prod as $pro)
        {
            if($pro->PDT_code == $request->PDT_code)
            {
                $qty->PDT_id = $pro->PDT_id;
            }
        }


        //$qty->PDT_id = $request-> PDT_id;
        $qty->STS_id = $request-> STS_id;

        $qty->save();
        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(QuantityProduct $quantityProduct)
    {
        //
    }
    public function Qlist($id)
    {
      // dd([$id]);
        $product = Product::id($id);
        $typeProduct = TypeProduct::all();
        $statusProduct = StatusProduct::all();
        $quantityProduct = QuantityProduct::all();
        $weightProduct = WeightProduct::all();
        $PDT_id = $id;
       // $data = QuantityProduct::select($id);
        //dd($data);
        return view('product.quantity',compact('product','typeProduct','PDT_id','statusProduct','quantityProduct','weightProduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuantityProduct $quantityProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuantityProduct $quantityProduct)
    {
        //
    }
}
