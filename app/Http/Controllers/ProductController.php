<?php

namespace App\Http\Controllers;

use App\Product;
use App\QuantityProduct;
use App\StatusProduct;
use App\TypeProduct;
use App\TypeUser;
use App\User;
use App\WeightProduct;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
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
    public function index(Request $request)
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
        $typeProduct = TypeProduct::all();
        $typeWeight = WeightProduct::all();



        return view('product.ingress',compact('typeProduct','typeWeight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion        $this->validate($request,[           'PRD_name' => 'required|string',           'PRD_brand' => 'required|string',            PRD_price' => 'required|integer',            'PRD_code' => 'required|string',            'PRD_description' => 'required|string',        ]);
        //almacenamiento

        $product = new Product();
        // ($product->name) = ES EL ATRIBUTO DE LA BDD
        // ($request->name) = VIENE DEL FORMULARIO VISTA
        $product->PDT_code = $request-> PDT_code;
        $product->PDT_name = $request->PDT_name;
        $product->PDT_brand = $request->PDT_brand;
        $product->PDT_price = $request->PDT_price;
        $product->TPR_type = $request->TPR_type;
        $product->PDT_weight = $request->PDT_weight;
        $product->WGT_type = $request->WGT_type;
        $product->PDT_description = $request->PDT_description;
        $product->save();
        //redirección<

        return redirect()->back()->with('message', 'Producto Registrado Exitosamente');
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

    public function list (Product $product,Request $request)
    {

        //$product = Product::paginate(10);
        $product = Product::name($request->get('PDT_name'))->code($request->get('PDT_code'))->brand($request->get('PDT_brand'))->type($request->get('TPR_type'))->paginate(10);
        $statusProduct = StatusProduct::all();
        $typeProduct = TypeProduct::all();
        $quantityProduct = QuantityProduct::all();



        return view('product.list',compact('typeProduct','statusProduct', 'product','quantityProduct'));

    }
    public function rusuario()
    {
        if (Auth::user()->TUS_id == 1)
        {
            $typeUser = TypeUser::all();
            $user = User::all();
            $this->obtener_datos_user();
            return view('product.registerU', compact('typeUser', 'user'))->with('message', 'Usuario Registrado Exitosamente');
        }
        else
        {
            return redirect()->back()->with('message', 'Permiso Denegado');
        }
    }

    public function CHstatus(Product $product,Request $request)
    {

        try {
            $product = Product::name($request->get('PDT_name'))->code($request->get('PDT_code'))->brand($request->get('PDT_brand'))->type($request->get('TPR_type'))->paginate(10);

            $id = $product[0]->PDT_id;
            $validator = 1;
            $prodName = $product[0]->PDT_name;
            $statusProduct = StatusProduct::all();
            $typeProduct = TypeProduct::all();
            $quantityProduct = QuantityProduct::all();
            return view('product.CHStatus', compact('typeProduct', 'statusProduct','validator' , 'prodName', 'id', 'product', 'quantityProduct'));
        }
        catch (\Exception $e)

        {
            $validator = 0;
            $statusProduct = StatusProduct::all();
            $typeProduct = TypeProduct::all();
            $quantityProduct = QuantityProduct::all();
            $prodName= "";
            return view('product.CHStatus', compact('prodName','statusProduct','validator','typeProduct','quantityProduct'))->with('message', 'Producto no encontrado');
        }
    }


    public function BuscarStock(Request $request)
    {

        $product = Product::code($request->get('PDT_code'))->paginate(10);
        //dd($product);
        $statusProduct = StatusProduct::all();
        $typeProduct = TypeProduct::all();


        return view('product.stock',compact('statusProduct','product','typeProduct'));
    }
    public function edit($id)
    {
        try
        {
            $prod = Product::id($id)->paginate(10);
            $prod = $prod[0];
            //dd($prod[0]);
        }
        catch (\Exception $e)
        {
            dd('a');
        }

        //dd($prod);
        return redirect()->route('product.edit',compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update($product)

    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function storage1()
    {

        return view('storage.CHstorage1');
    }
    public function storage2()
    {

        return view('storage.CHstorage2');
    }
    public function destroy($id)
    {
        //

        DB::delete('delete from products where PDT_id = ?',[$id]) ;

        return redirect()->back()->with('message', 'Producto Eliminado Exitosamente');
    }

    public function obtener_datos_stock()
    {

        $resumido = DB::select("SELECT
                    producto.PDT_id AS id,
                    producto.PDT_name AS name,
                    producto.PDT_brand AS brand,
                    producto.PDT_price AS price,
                    producto.PDT_weight as weight,
                    type_products.TPR_description AS type,
                    weight_products.WGT_description AS Tweight,
                    producto.PDT_code AS code
                        FROM
                            products AS producto
                        LEFT JOIN type_products AS type_products ON type_products.TPR_id = producto.TPR_type
                        LEFT JOIN weight_products AS weight_products ON weight_products.WGT_id = producto.WGT_type");
        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  
                data-id="' . $resumido->id . '" data-name="' . $resumido->name . '" data-brand="' . $resumido->brand . '" data-price="' . $resumido->price . '" 
                data-type="' . $resumido->type . '" data-code="' . $resumido->code . ' " data-weight="' . $resumido->weight. '" data-Tweight="' . $resumido->Tweight.'" class="btn btn-xs btn-primary editar_boton">
                <i class="glyphicon glyphicon-edit"></i> Editar</a>
                
                 <a href="' . route('eliminar_producto',['Product'=> $resumido->id]) . '" method ="POST" class="btn btn-xs btn-danger eliminar_boton">
                <i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                
                <a href="' . route('Qlist',['Product'=> $resumido->id]) . '" method ="POST" class="btn btn-xs btn-success eliminar_boton">
                <i class="glyphicon glyphicon-list-alt"></i> Detalles</a>';
            })

            ->make(true);
    }

    public function eliminar_desde_datatable($id)
    {
        DB::delete('delete from products where PDT_id = ?',[$id]) ;
        return redirect('/productos')->with('message', 'Producto Eliminado Exitosamente');
    }

    public function editar_producto(Request $request)
    {
       //dd('UPDATE products FROM products SET PDT_name ="'. $request->input('name') .'" PDT_brand ="'. $request->input('brand') .'" PDT_price ="'. $request->input('price') .'" PDT_code ="'. $request->input('code') .'" PDT_weight ="'. $request->input('weight') .'" WHERE PDT_id ="'. $request->input('id_edit') .'"');

        DB::update('UPDATE products SET PDT_name ="'. $request->input('name') .'", PDT_brand ="'. $request->input('brand') .'", PDT_price ="'. $request->input('price') .'", PDT_code ="'. $request->input('code') .'", PDT_weight ="'. $request->input('weight') .'" WHERE PDT_id ="'. $request->input('id_edit') .'"');
        return redirect('/productos')->with('message', 'Producto Editado Exitosamente');
    }


    public function obtener_datos_user()
    {

        $resumido = DB::select("SELECT
                    usuario.id AS id,
                    usuario.name AS name,
                    usuario.rut AS rut,
                    usuario.email AS email,
                    tipo.TUS_description AS type
                    FROM
                            users AS usuario
                        LEFT JOIN type_users AS tipo ON tipo.TUS_id = usuario.TUS_id");
        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  
                data-id="' . $resumido->id . '" data-name="' . $resumido->name . '" data-rut="' . $resumido->rut . '" data-type="' . $resumido->type . '" data-email="' . $resumido->email . '" 
                class="btn btn-xs btn-primary editar_boton">
                <i class="glyphicon glyphicon-edit"></i> Editar</a>
                
                 <a href="' . route('eliminar_usuario',['Product'=> $resumido->id]) . '" method ="POST" class="btn btn-xs btn-danger eliminar_boton">
                <i class="glyphicon glyphicon-trash"></i> Eliminar</a>';
            })

            ->make(true);
    }
    public function editar_usuario(Request $request)
    {
        //dd('UPDATE products FROM products SET PDT_name ="'. $request->input('name') .'" PDT_brand ="'. $request->input('brand') .'" PDT_price ="'. $request->input('price') .'" PDT_code ="'. $request->input('code') .'" PDT_weight ="'. $request->input('weight') .'" WHERE PDT_id ="'. $request->input('id_edit') .'"');

        DB::update('UPDATE users SET name ="'. $request->input('name') .'", rut ="'. $request->input('rut') .'", email ="'. $request->input('email') .'" WHERE id ="'. $request->input('id_edit') .'"');
        return redirect('/rusuario')->with('message', 'Usuario Editado Exitosamente');
    }
    public function eliminar_usuario($id)
    {
        DB::delete('delete from users where id = ?',[$id]) ;
        return redirect('/productos')->with('message', 'Usuario Eliminado Exitosamente');
    }
}
