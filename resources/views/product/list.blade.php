@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Mis Productos



                    <div class="pull-right">
                        <a href="{{route('product.create')}}"><div class="btn btn-primary">Agregar Productos</div></a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-stripped">
                                <thead>
                                    <tr class="active">
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Tipo de Producto</th>
                                        <th>Código de Producto</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Operación</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quantityProduct as $quant)

                                    <tr>@foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id)<td>{{ $prod->PDT_name}}@endif</td>
                                        @endforeach
                                        @foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id)<td>{{ $prod->PDT_brand }}@endif</td>
                                        @endforeach
                                        @foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id)<td>${{ $prod->PDT_price }}@endif</td>
                                        @endforeach
                                        @foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id)<td>{{ $quant->QTY_description}}@endif</td>
                                        @endforeach
                                        <td>
                                            @foreach($typeProduct as $type)
                                            @foreach($product as $prod)
                                            @if($type->TPR_id == $prod->TPR_type && $quant->PDT_id == $prod->PDT_id){{$type->TPR_description}}@endif
                                            @endforeach
                                            @endforeach
                                        </td>
                                        @foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id)<td>{{ $prod->PDT_code }}@endif</td>
                                        @endforeach
                                        @foreach($product as $prod)
                                        @if($quant->PDT_id == $prod->PDT_id) <td>{{ $prod->PDT_description}}@endif</td>
                                        @endforeach
                                        <td>
                                            @foreach($statusProduct as $type)
                                            @foreach($product as $prod)
                                            @if($type->STS_id == $quant->STS_id && $quant->PDT_id == $prod->PDT_id){{$type->STS_description}}@endif
                                            @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-xs">Editar</a>
                                            <a href="#" class="btn btn-xs">Eliminar</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
