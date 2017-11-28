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

    public function list (Product $product)
    {
        $product = Product::all();
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
            return view('product.registerU', compact('typeUser', 'user'))->with('message', 'Producto Registrado Exitosamente');
        }
        else
        {
            return redirect()->back()->with('message', 'Permiso Denegado');
        }
    }

    public function CHstatus()
    {
        $product = Product::all();
        $statusProduct = StatusProduct::all();
        return view('product.CHStatus',compact('statusProduct','product'));
    }
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
    public function updateSTS(Request $request, Product $product)
    {
        $product->update($request->only('STS_id','descrption','url') );

        return redirect()->route('post_path',['post' => $post->id]);
    }
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
