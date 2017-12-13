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

                            {{ Form::text('PDT_code',null,['class'=>'form-control','placeholder'=>'Código Producto']) }}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {{Form::close()}}
                    </div>
                        <div class="panel-body pull-left">
                       @if($validator == 1) <h1>{{$prodName}}</h1> @endif
                        </div>


                <div class="panel-body">
                    @if($validator == 1)
                        <table class="table table-stripped">
                            <form class="form-horizontal" action="{{ route('actSTS',['QuantityProduct'=>$id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                            <thead>
                            <tr class="active">
                                <th>Cantidad Actual</th>
                                <th>Bodega/Estado Actual</th>
                                <th>Cantidad Destino</th>
                                <th>Bodega Destino</th>

                                <th>Operación</th>

                                <th></th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($quantityProduct as $prod)
                            <tr>
                                <!-----------------------------CANTIDAD------------------------------------------------------------------>
                                @if($id == $prod->PDT_id)
                                    <td>
                                    {{$prod->QTY_description}}
                                    </td>
                                @endif
                                <!-----------------------------BODEGA/ESTADO------------------------------------------------------------------------------>
                                @if($id == $prod->PDT_id)
                                        <td>

                                        @foreach($statusProduct as $type)
                                            @if($prod->STS_id == $type->STS_id)  {{$type->STS_description}} @endif
                                        @endforeach

                                         </td>
                                @endif
                                <!------------------------------STOCK A RESTAR----------------------------------------------------------------------------->
                                @if($id == $prod->PDT_id)

                                    <td>
                                        <div class="col-md-6">
                                            <input id="QTY_description" type="number" class="form-control" name="QTY_description" value="{{ old('QTY_description') }}" required autofocus/>
                                        </div>
                                    </td>
                                @endif
                                <!---------------------------------BODEGA/ESTADO DESTINO----------------------------------------------------------------------->
                                @if($id == $prod->PDT_id)
                                    <td>

                                        <select name="STS_id" id="" class="form-control">
                                            <option value="">Seleccione Estado/Bodega...</option>
                                            @foreach($statusProduct as $type)
                                                <option value="{{ $type->STS_id }}"> {{$type->STS_description}} </option>
                                            @endforeach
                                            <option value="Merma">MERMA</option>
                                            <option value="Vendido">VENDIDO</option>
                                            <option value="Oferta">OFERTA</option>
                                        </select>

                                     </td>
                                @endif
                                <!-----------------------------------BOTON--------------------------------------------------------------->
                                @if($id == $prod->PDT_id)
                                    <td>

                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-primary">
                                                    Cambiar
                                                </button>
                                            </div>

                                    </td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                            </form></table>


                    @endif

                    @if($validator == 0)
                       <div class="col-md-12">
                           <div class="alert alert-danger">
                               Producto no Encontrado
                           </div>
                       </div>
                    @endif




                <a href="{{ url('/home' )}}" ><span class=""></span>
                    <button  class="btn btn-success">Atrás</button>
                </a>
                        @if($validator == 1){{ $product->appends(Request::all())->render() }}@endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection