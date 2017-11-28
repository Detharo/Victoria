@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cambio de Estados de Productos</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="PUT" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="code" class="col-md-4 control-label">Producto</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="Ingrese Código del Producto" name="name" value="{{ old('code') }}" required autofocus>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                                <!---------------------------------------------TIPO DE ESTADO ACTUAL---------------------------------------------------->
                                <div class="form-group{{ $errors->has('status_product') ? ' has-error' : '' }}">
                                    <label for="status_product" class="col-md-4 control-label">Estado Actual:</label>
                                    <div class="col-md-6">
                                        <select name="status_product" id="" class="form-control">
                                            <option value="">Seleccione Estado...</option>
                                            @foreach($statusProduct as $stat)
                                                <option value="{{ $stat->STS_id }}"> {{$stat->STS_description}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!---------------------------------------------TIPO DE ESTADO NUEVO---------------------------------------------------->
                                <div class="form-group{{ $errors->has('status_product') ? ' has-error' : '' }}">
                                    <label for="status_product" class="col-md-4 control-label">Estado Nuevo:</label>
                                    <div class="col-md-6">
                                        <select name="status_product" id="" class="form-control">
                                            <option value="">Seleccione Estado...</option>
                                            @foreach($statusProduct as $stat)
                                                <option value="{{ $stat->STS_id }}"> {{$stat->STS_description}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cambiar
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection