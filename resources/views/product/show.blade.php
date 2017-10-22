@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Producto: {{$product->name}}</div>

                    <div class="panel-body">
                        <strong>Marca</strong><p>{{$product->brand}}</p>
                        <strong>Precio</strong><p>{{$product->price}}</p>
                        <strong>Cantidad</strong><p>{{$product->quantity}}</p>
                        <strong>Tipo de Producto:</strong><p>{{$product->tipe_product}}</p>
                        <strong>Código de Producto</strong><p>{{$product->cod_product}}</p>
                        <strong>Estado del Producto</strong><p>{{$product->cod_status}}</p>
                        <strong>Descripción de Producto</strong><p>{{$product->des_product}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
