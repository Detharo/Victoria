@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('product.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <label for="brand" class="col-md-4 control-label">Marca:</label>

                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control" name="brand" value="{{ old('brand') }}" required autofocus>

                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Precio:</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">Cantidad:</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" required autofocus>

                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type_product') ? ' has-error' : '' }}">
                                <label for="type_product" class="col-md-4 control-label">Tipo Producto:</label>
                                <div class="col-md-6">
                                <select name="type_product" id="" class="form-control">
                                    <option value="">Seleccione Tipo...</option>
                                    @foreach($typeProduct as $type)
                                        <option value="{{ $type->id }}"> {{$type->description}} </option>
                                        @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cod_product') ? ' has-error' : '' }}">
                                <label for="cod_product" class="col-md-4 control-label">Código de Producto:</label>

                                <div class="col-md-6">
                                    <input id="cod_product" type="text" class="form-control" name="cod_product" value="{{ old('cod_product') }}" required autofocus>

                                    @if ($errors->has('cod_product'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cod_product') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('des_product') ? ' has-error' : '' }}">
                                <label for="des_product" class="col-md-4 control-label">Descripción del Producto:</label>

                                <div class="col-md-6">
                                    <input id="des_product" type="text" class="form-control" name="des_product" value="{{ old('des_product') }}" required autofocus>

                                    @if ($errors->has('des_product'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('des_product') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('cod_status') ? ' has-error' : '' }}">
                                <label for="cod_status" class="col-md-4 control-label">Estado del Producto:</label>

                                <div class="col-md-6">

                                    <select name="cod_status" id="" class="form-control">
                                        <option value="">Seleccione Estado...</option>
                                        @foreach($statusProduct as $type)
                                            <option value="{{ $type->id }}"> {{$type->description}} </option>
                                        @endforeach
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
                </div>
            </div>
        </div>
    </div>
@endsection
