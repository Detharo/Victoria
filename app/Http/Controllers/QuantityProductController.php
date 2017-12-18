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
use Yajra\DataTables\Facades\DataTables;

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
        $sold = new SoldProduct();
        $offer= new OfferProduct();
        $dcs = new DecreaseProduct();
        //$qty->QTY_description = $request->QTY_description;
        IF($request->STS_id == 'MERMA')
        {
            foreach ($prod as $pro)
            {

                if($pro->PDT_code == $request->PDT_code)
                {
                    $producto = $pro->PDT_id;

                }

            }

            if($producto == "" || $producto == null )
            {
                return redirect()->back()->with('message2', 'Producto No Existe');
            }
            else
            {
                $dcs->PDT_id = $producto;//INSERCIÓN DEL ID
            }

            $quantity=  DB::select('SELECT CAST( DCS_quantity AS integer) as resu from decrease_products WHERE PDT_id = '. $dcs->PDT_id);

            //verifico si el producto es nuevo
            if($quantity == "" || $quantity == null)
            {
                $dcs->DCS_quantity = $request->QTY_description;   //INSERCION DE CANTIDAD DE  PRODUCTO NUEVO
                $dcs->save();

                return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
            }
            else{
                $quantity = (int) $quantity[0]->resu;
                $quantity = (int) $request->QTY_description+$quantity ;
                                //INSERCION DE CANTIDAD DE  PRODUCTO EXISTENTE
                $update = $this->updateSLD($dcs->PDT_id,$quantity);
                return $update;
            }

        }




        IF($request->STS_id == 'VENDIDO')
        {
            foreach ($prod as $pro)
            {

                if($pro->PDT_code == $request->PDT_code)
                {
                    $producto = $pro->PDT_id;

                }

            }

            if($producto == "" || $producto == null )
            {
                return redirect()->back()->with('message2', 'Producto No Existe');
            }
            else
            {
                $sold->PDT_id = $producto;//INSERCIÓN DEL ID
            }

            $quantity=  DB::select('SELECT CAST( SLD_quantity AS integer) as resu from sold_products WHERE PDT_id = '. $sold->PDT_id);

            //verifico si el producto es nuevo
            if($quantity == "" || $quantity == null)
            {
                $sold->SLD_quantity = $request->QTY_description;   //INSERCION DE CANTIDAD DE  PRODUCTO NUEVO
                $sold->save();

                return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
            }
            else{
                $quantity = (int) $quantity[0]->resu;
                $quantity = (int) $request->QTY_description+$quantity ;
                                  //INSERCION DE CANTIDAD DE  PRODUCTO EXISTENTE
                $update = $this->updateSLD($producto,$quantity);
                return $update;
            }

        }


        //buscador de coincidencias entre el codigo del producto y su ID
        foreach ($prod as $pro)
        {

            if($pro->PDT_code == $request->PDT_code)
            {
                $producto = $pro->PDT_id;

            }

        }

        if($producto == "" || $producto == null )
        {
            return redirect()->back()->with('message2', 'Producto No Existe');
        }
        else
        {
            $qty->PDT_id = $producto;//INSERCIÓN DEL ID
        }

        $qty->STS_id = $request->STS_id;

        $quantity=  DB::select('SELECT CAST( QTY_description AS integer) as resu from quantity_products WHERE PDT_id = '.$qty->PDT_id.' AND STS_id = '.$qty->STS_id);

        //verifico si el producto es nuevo
        if($quantity == "" || $quantity == null)
        {
            $qty->QTY_description = $request->QTY_description;   //INSERCION DE CANTIDAD DE  PRODUCTO NUEVO
            $qty->save();
            return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
        }
        else{
            $quantity = (int) $quantity[0]->resu;
            $quantity = (int) $request->QTY_description+$quantity ;
            $qty->QTY_description = $quantity;                   //INSERCION DE CANTIDAD DE  PRODUCTO EXISTENTE
            $update = $this->update($qty->PDT_id,$quantity,$qty->STS_id);
            return $update;
        }


        //


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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function updateDCS($id,$quantity)
    {

        //UPDATE persondata SET edad=edad*2, edad=edad+1;
        DB::update('UPDATE decrease_products SET DCS_quantity ='.$quantity.' WHERE PDT_id = '.$id);



        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function updateSLD($id,$quantity)
    {

        //UPDATE persondata SET edad=edad*2, edad=edad+1;
        DB::update('UPDATE sold_products SET SLD_quantity ='.$quantity.' WHERE PDT_id = '.$id);



        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuantityProduct  $quantityProduct
     * @return \Illuminate\Http\Response
     */
    public function updateOFF($id,$quantity,$sts)
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

    public function actSTS(Request $request)
    {
            dd($request->a);




        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
    }
    public function obtener_datos_quantity()
    {

        $resumido = DB::select("SELECT
                    cantidad.QTY_id AS id,
                    cantidad.QTY_description AS quantity,        
                    status_products.STS_description AS type,
                    products.PDT_name AS name
                        FROM
                            quantity_products AS cantidad
                        LEFT JOIN status_products AS status_products ON status_products.STS_id = cantidad.STS_id
                        LEFT JOIN products AS products ON products.PDT_id = products.PDT_id
                        WHERE products.PDT_id = cantidad.PDT_id AND status_products.STS_id = cantidad.STS_id");
        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  
                data-id="' . $resumido->id . '" 
                data-name="' . $resumido->name . '" 
                data-quantity="' . $resumido->quantity . '" 
                data-type="' . $resumido->type . '" 
                class="btn btn-xs btn-primary editar_boton">
                <i class="glyphicon glyphicon-edit"></i> Editar</a>
                ';
            })

            ->make(true);
    }
    public function editar_producto(Request $request)
    {
        //dd('UPDATE products FROM products SET PDT_name ="'. $request->input('name') .'" PDT_brand ="'. $request->input('brand') .'" PDT_price ="'. $request->input('price') .'" PDT_code ="'. $request->input('code') .'" PDT_weight ="'. $request->input('weight') .'" WHERE PDT_id ="'. $request->input('id_edit') .'"');
    dd($request);
        DB::update('UPDATE users SET name ="'. $request->input('name') .'", rut ="'. $request->input('rut') .'", email ="'. $request->input('email') .'" WHERE id ="'. $request->input('id_edit') .'"');
        return redirect('/rusuario')->with('message', 'Usuario Editado Exitosamente');
    }
}

