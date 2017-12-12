@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Mis Productos</div>

                    <div class="panel-body">
                        {{ Form::model(Request::all(),['url'=> '/CHStatus','method'=> 'GET','class'=>'navbar-form navbar-left','role'=>'search']) }}
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

                        <table class="table table-stripped">
                            <thead>
                            <tr class="active">
                                <th>Cantidad</th>
                                <th>Bodega/Estado Actual</th>
                                <th>Bodega Destino</th>
                                <th>Operación</th>

                                <th></th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th>Cantidad</th>
                                <th>Bodega/Estado Actual</th>
                                <th>

                                        <select name="STS_id" id="" class="form-control">
                                            <option value="">Seleccione Estado/Bodega...</option>
                                            @foreach($statusProduct as $type)
                                                <option value="{{ $type->STS_id }}"> {{$type->STS_description}} </option>
                                            @endforeach
                                            <option value="Merma">MERMA</option>
                                            <option value="Vendido">VENDIDO</option>
                                            <option value="Oferta">OFERTA</option>
                                        </select>

                                </th>
                                <th>
                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-primary">
                                            Cambiar
                                        </button>
                                    </div>
                                </th>

                                <th></th>

                            </tr>


                            </tbody>
                        </table>


                    </div><a href="{{ url('/home' )}}" ><span class=""></span>

                    <button  class="btn btn-success">Atrás</button>
                </a>
                </div>
            </div>
        </div>
    </div>

@endsection