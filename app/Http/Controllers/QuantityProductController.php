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
use DB;
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
        //$qty->QTY_description = $request->QTY_description;


        //buscador de coincidencias entre el codigo del producto y su ID
        foreach ($prod as $pro)
        {
            if($pro->PDT_code == $request->PDT_code)
            {
                $qty->PDT_id = $pro->PDT_id;
            }
        }
        $qty->STS_id = $request-> STS_id;

        $quantity=  DB::select('SELECT CAST( QTY_description AS integer) as resu from quantity_products WHERE PDT_id = '.$qty->PDT_id.' AND STS_id = '.$qty->STS_id);


        $quantity = (int) $quantity[0]->resu;
        $quantity = (int) $request->QTY_description+$quantity ;

        $qty->QTY_description = $quantity;


        //$qty->save();
        $update = $this->update($qty->PDT_id,$quantity,$qty->STS_id);
        return $update;
        //return redirect()->back()->with('message', 'Producto Registrado Exitosamente');


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
        $product = Product::all();
        $typeProduct = TypeProduct::all();
        $statusProduct = StatusProduct::all();
        $quantityProduct = QuantityProduct::all();
        $weightProduct = WeightProduct::all();
       // $produ = DB::select('SELECT * FROM quantity_products WHERE PDT_id= ',$id);
       // $id = DB::select('SELECT producto.PDT_name,SUM(stock.QTY_description) as resu, bodega.STS_description FROM quantity_products stock JOIN status_products bodega ON bodega.STS_id=stock.STS_id JOIN products producto ON producto.PDT_id=stock.PDT_id WHERE producto.PDT_id = '.$id.' GROUP BY bodega.STS_description;');



        //dd($id[0]->resu);

    // $data = QuantityProduct::select($id);
        //dd($data);
        return view('product.quantity',compact('product','typeProduct','id','statusProduct','quantityProduct','weightProduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function update($id,$quantity,$sts)
    {
        //UPDATE persondata SET edad=edad*2, edad=edad+1;
        DB::update('UPDATE quantity_products SET QTY_description ='.$quantity.' WHERE PDT_id = '.$id.' AND STS_id= '.$sts );

        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
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
