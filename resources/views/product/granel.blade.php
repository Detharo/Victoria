@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">Cambio de Peso de Producto




                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
    hola mundo



                            </div>
                        </div><div class="pull-left">
                            <a href="{{url('/home')}}"><div class="btn btn-success">Atrás</div></a>

                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection