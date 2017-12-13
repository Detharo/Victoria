@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default clearfix">

                    <div class="panel-heading ">Agregar Stock</div>


                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('stock.store') }}">
                        {{ csrf_field() }}

                        <!---------------------------------------------CÓDIGO PRODUCTO---------------------------------------------------->
                            <div class="form-group{{ $errors->has('PDT_code') ? ' has-error' : '' }}">
                                <label for="PDT_code" class="col-md-4 control-label">Código de Producto:</label>

                                <div class="col-md-6">
                                    <input id="PDT_code" type="text" class="form-control" name="PDT_code" value="{{ old('PDT_code') }}" required autofocus>

                                    @if ($errors->has('PDT_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('PDT_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!---------------------------------------------CANTIDAD---------------------------------------------------->
                            <div class="form-group{{ $errors->has('QTY_description') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Cantidad:</label>

                                <div class="col-md-6">
                                    <input id="QTY_description" type="number" class="form-control" name="QTY_description" value="{{ old('QTY_description') }}" required autofocus>

                                    @if ($errors->has('QTY_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('QTY_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!---------------------------------------------ESTADO/BODEGA---------------------------------------------------->
                            <div class="form-group{{ $errors->has('STS_id') ? ' has-error' : '' }}">
                                <label for="STS_id" class="col-md-4 control-label">Estado/Bodega:</label>
                                <div class="col-md-6">
                                    <select name="STS_id" id="" class="form-control">
                                        <option value="">Seleccione Estado/Bodega...</option>
                                        @foreach($statusProduct as $type)
                                            <option value="{{ $type->STS_id }}"> {{$type->STS_description}} </option>
                                        @endforeach
                                        <option value="MERMA">MERMA</option>
                                        <option value="VENDIDO">VENDIDO</option>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                            @if (Session::has('message2'))
                                <div class="alert alert-danger">{{ Session::get('message2') }}</div>
                            @endif
                            <a href="{{ url('/home' )}}" ><span class=""></span>

                                <button  class="btn btn-success">Atrás</button>
                            </a>
                    </div>
                </div>
            </div>
        </div>

@endsection
