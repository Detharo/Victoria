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
                                    @foreach($product as $prod)
                                        <tr>
                                            <td>{{ $prod->name}}</td>
                                            <td>{{ $prod->brand }}</td>
                                            <td>${{ $prod->price }}</td>
                                            <td>{{ $prod->quantity}}</td>
                                            <td>
                                                @foreach($typeProduct as $type)
                                                   @if($type->id == $prod->type_product){{$type->description}}@endif
                                                @endforeach
                                            </td>
                                            <td>{{ $prod->cod_product }}</td>
                                            <td>{{ $prod->des_product}}</td>
                                            <td>
                                                @foreach($statusProduct as $type)
                                                   @if($type->id == $prod->cod_status){{$type->description}}@endif
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
                                {{ $product->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
