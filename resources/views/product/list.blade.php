@extends('layouts.app')

@section('content')
<div class="container">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Listado de Stock</div>

                    <a href="{{route('product.create')}}"><div class="btn btn-info">Agregar Productos</div></a>
                <div class="col-md-12">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                </div>

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
                            <td>Peso Producto</td>
                            <td>Tipo de Peso</td>
                            <td>Operaciones</td>
                            <td> </td>
                        </tr>
                        </thead>
                    </table>
                    <a href="{{ url('/home' )}}" ><span class=""></span>

                        <button  class="btn btn-success">Atrás</button>
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
<div class="modal fade" id="modal_editar" role="dialog">
    <form class="form-horizontal" method="POST" action="{{ route('editar_productos') }}">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Producto </h4>
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
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="precio">Codigo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edit_code" name="code" value="{{ old('code') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="peso">Peso:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="edit_weight" name="weight" value="{{ old('weight') }}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/stock/script.js') }}"></script>
</div>
@endsection