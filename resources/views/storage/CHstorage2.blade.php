@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cambio de Bodega 2 a Bodega 1</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('statusproduct.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('STS_description') ? ' has-error' : '' }}">
                                <label for="STS_description" class="col-md-4 control-label">Código de Producto</label>

                                <div class="col-md-6">
                                    <input id="PDT_code" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Código de Barras" class="form-control" name="STS_description" value="{{ old('STS_description') }}" required autofocus>

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
                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                        </div>

                        <a href="{{ url('/home' )}}" ><span class=""></span>

                            <button  class="btn btn-success">Atrás</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
