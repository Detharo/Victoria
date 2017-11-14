@extends('layouts.app')

@section('content')
    <!---<div class="row">-->

   <!-- </div>-->

    <div class="row">
        <div class="col-xs-4 col-md-2">
            <a href="#" >
                <img src="{{ asset('/img/logoDA2.png') }}" width="270" height="300" alt="Don Agustin">
            </a>
        </div>
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading"><div class="page-header">
                        <h1>Bienvenido <small>{{ Auth::user()->name }}</small></h1>
                    </div></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¿Que deseas hacer?
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="list-group">

                        <a href="{{route('product.create')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Ingresar Productos</a>
                        <a href="{{ url('/productos') }}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Listar Productos</a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Ventas</a>
                        <a href="{{ route('typeproduct.create' )}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Agregar Tipos de Productos</a>
                        <a href="{{ route('statusproduct.create' )}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Agregar Bodegas</a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Detalles de salidas</a>
                        <a href="{{ url('/rusuario' )}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> Agregar Usuarios</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
