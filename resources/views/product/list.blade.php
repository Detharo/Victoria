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
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Precio</th>

                                        <th>Tipo de Producto</th>
                                        <th>Código de Producto</th>
                                        <th>Operación</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $prod)

                                    <tr>
                                        <td>{{ $prod->PDT_id }}</td>
                                        <td>{{ $prod->PDT_name}}</td>
                                        <td>{{ $prod->PDT_brand }}</td>
                                        <td>${{ $prod->PDT_price }}</td>
                                        <td>@foreach($typeProduct as $type)
                                                @if($prod->TPR_type == $type->TPR_id)  {{$type->TPR_description}} @endif
                                            @endforeach</td>
                                        <td>{{ $prod->PDT_code }}</td>
                                        <td >
                                            <form  method="POST" action="{{ route('statusproduct.update',['$StatusProduct'=>$prod->STS_id])  }}">


                                                <button type="submit" class="btn btn-info">Editar</button>
                                            </form>
                                        </td>
                                        <td >
                                            <form action="{{ route('statusproduct.destroy',['StatusProduct'=> $prod->STS_id]) }}" method="POST">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">Eliminar</button>

                                            </form>

                                        <td >
                                            <form  method="POST" action="{{ route('statusproduct.update',['$StatusProduct'=>$prod->STS_id])  }}">


                                                <button type="submit" class="btn btn-success">Detalles</button>
                                            </form>
                                        </td>

                                        </td>



                                    @endforeach
                                </tbody>
                            </table>
                {{ $product->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
