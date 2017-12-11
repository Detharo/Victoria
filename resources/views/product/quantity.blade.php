@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">Mis Productos



                        <div class="pull-right">
                            <a href="{{url('/productos')}}"><div class="btn btn-primary">Atrás</div></a>

                        </div>
                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

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
                                        <th>Cantidad</th>
                                        <th>Estado/Bodega</th>

                                        <th></th>

                                    </tr>
                                    </thead>

                                    {{ $result=DB::select( DB::raw('SELECT producto.PDT_name,SUM(stock.QTY_description), bodega.STS_description FROM quantity_products stock JOIN status_products bodega ON bodega.STS_id=stock.STS_id JOIN products producto ON producto.PDT_id=stock.PDT_id WHERE producto.PDT_id='.$PDT_id.' GROUP BY bodega.STS_description;')) }}
                                    {{ dd('a2') }}
                                    {{ dd($data->get('PDT_name')) }}
                                    <tbody>@foreach($data as $prod)




                                        <tr>
                                            <td></td>
                                            <td>{{ $prod->get('PDT_name')}}</td>
                                            <td></td>
                                            <td></td>


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
