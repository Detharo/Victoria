@extends('layouts.app')

@section('content')
<div class="container">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
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

                                            <a href="{{ route('product.edit',[$prod->PDT_id]) }}"><button type="submit" class="btn btn-info" >Editar</button></a>
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
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Listado de Stock</div>
                <div class="panel-body">
                    <table id="stock-table" class="table table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Marca</td>
                            <td>Precio</td>
                            <td>Tipo Producto</td>
                            <td>Codigo Producto</td>
                            <td>Operaciones</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_editar" role="dialog">
    <form class="form-horizontal" method="POST" action="{{ route('editar_producto') }}">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="Nombre">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edit_name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="Marca">Marca:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edit_brand" name="brand" value="{{ old('brand') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="precio">Precio:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="edit_price" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    <input type="hidden" name="id_edit" id="id_modificar" value="" >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/stock/script.js') }}"></script>
</div>
@endsection
