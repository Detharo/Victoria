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
                    <div class="col-md-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                    </div>
                </div>
                    {{ Form::model(Request::all(),['url'=> '/productos','method'=> 'GET','class'=>'navbar-form navbar-left','role'=>'search']) }}
                    <div class="form-group">
                        {{ Form::text('PDT_name',null,['class'=>'form-control','placeholder'=>'Nombre Producto']) }}
                        {{ Form::text('PDT_brand',null,['class'=>'form-control','placeholder'=>'Marca Producto']) }}
                        <select name="TPR_type" id="" class="form-control">
                            <option value="">Seleccione Tipo de Producto...</option>
                            @foreach($typeProduct as $type)
                                <option value="{{ $type->TPR_id }}"> {{$type->TPR_description}} </option>
                            @endforeach
                        </select>
                        {{ Form::text('PDT_code',null,['class'=>'form-control','placeholder'=>'Código Producto']) }}
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                {{Form::close()}}
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
                                           <!-- <form  method="POST" action="{{ route('statusproduct.update',['$StatusProduct'=>$prod->STS_id])  }}"> -->


                                                <button type="submit" class="btn btn-info" value="{{ $prod->PDT_id }}" data-toggle="modal" data-target="#myModal">Editar</button>
                                         <!--   </form> -->
                                        </td>
                                        <td >
                                            <form action="{{ route('product.destroy',['Product'=> $prod->PDT_id]) }}" method="POST">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">Eliminar</button>

                                            </form>

                                        <td >
                                            <form action="{{ url('/product.quantity',['Product'=> $prod->PDT_id])  }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('POST') }}
                                                <button type="submit" class="btn btn-success">Detalles</button>
                                            </form>
                                        </td>
                                        <!-- <td >
                                            <a href="{{ url('product.quantity' )}}" ><span class=""></span>

                                                <button  class="btn btn-success">Detalles</button>
                                            </a>
                                        </td>
                                        -->

                                        </td>





                                    @endforeach
                                </tbody>
                            </table>
                {{ $product->appends(Request::all())->render() }}





                        </div>
                    </div>

                </div>

                <a href="{{ url('/home' )}}" ><span class=""></span>

                    <button  class="btn btn-success">Atrás</button>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
