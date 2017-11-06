@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default clearfix">
                    
                    <div class="panel-heading ">Registro de Producto</div>


                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('product.store') }}">
                            {{ csrf_field() }}


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

                            <div class="form-group{{ $errors->has('PDT_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input id="PDT_name" type="text" class="form-control" name="PDT_name" value="{{ old('PDT_name') }}" required autofocus>

                                    @if ($errors->has('PDT_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('PDT_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('PDT_brand') ? ' has-error' : '' }}">
                                <label for="PDT_brand" class="col-md-4 control-label">Marca:</label>

                                <div class="col-md-6">
                                    <input id="PDT_brand" type="text" class="form-control" name="PDT_brand" value="{{ old('PDT_brand') }}" required autofocus>

                                    @if ($errors->has('PDT_brand'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('PDT_brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('PDT_price') ? ' has-error' : '' }}">
                                <label for="PDT_price" class="col-md-4 control-label">Precio:</label>

                                <div class="col-md-6">
                                    <input id="PDT_price" type="text" class="form-control" name="PDT_price" value="{{ old('PDT_price') }}" required autofocus>

                                    @if ($errors->has('PDT_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('PDT_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('TPR_type') ? ' has-error' : '' }}">
                                <label for="TPR_type" class="col-md-4 control-label">Tipo Producto:</label>
                                <div class="col-md-6">
                                <select name="TPR_type" id="" class="form-control">
                                    <option value="">Seleccione Tipo...</option>
                                    @foreach($typeProduct as $type)
                                        <option value="{{ $type->TPR_id }}"> {{$type->TPR_description}} </option>
                                        @endforeach
                                </select>
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('PDT_description') ? ' has-error' : '' }}">
                                <label for="PDT_description" class="col-md-4 control-label">Descripción del Producto:</label>

                                <div class="col-md-6">
                                    <input id="PDT_description" type="text" class="form-control" name="PDT_description" value="{{ old('PDT_description') }}" required autofocus>

                                    @if ($errors->has('PDT_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('PDT_description') }}</strong>
                                    </span>
                                    @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection
