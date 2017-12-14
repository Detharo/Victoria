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

        $product = Product::code($request->get('PDT_code'))->paginate(10);;
        //dd($product);
        $statusProduct = StatusProduct::all();
        $typeProduct = TypeProduct::all();


        return view('product.stock',compact('statusProduct','product','typeProduct'));
    }
    public function edit(Product $product)
    {
        //
        dd('a');
        $prod = Product::FindOrFail($product);
        return view('product.edit',compact('prod'));
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
                    type_products.WGT_description AS type,
                    producto.PDT_code AS code
                        FROM
                            products AS producto
                        LEFT JOIN weight_products AS type_products ON type_products.WGT_id = producto.TPR_type");
        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="' . $resumido->id . '" data-name="' . $resumido->name . '" data-brand="' . $resumido->brand . '"
                 data-price="' . $resumido->price . '" data-type="' . $resumido->type . '" data-code="' . $resumido->code . '" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->make(true);
    }

    public function eliminar_desde_datatable(Request $request)
    {
        $id = $request->input('id');
        $perfil = Product::find($id);
        $perfil->delete();
        return redirect('/productos');
    }

    public function editar_producto(Request $request)
    {
        $id = $request->input('id_edit');
        $producto = Product::find($id);
        $producto->name = $request->input('name');
        $producto->brand = $request->input('brand');
        $producto->price = $request->input('price');
        $producto->save();
        return redirect('/productos');
    }

}
