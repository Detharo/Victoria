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
                    <div class="col-md-12">
                        @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
                        @endif

                    </div>
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

                        <a href="{{route('product.create')}}" class="list-group-item"><span class=""></span> Ingresar Productos</a>
                        <a href="{{ url('/productos') }}" class="list-group-item"><span class=""></span> Listar Productos</a>
                        @if (Auth::user()->TUS_id == 1)
                            <a href="{{ route('typeproduct.create' )}}" class="list-group-item"><span class=""></span> Agregar Tipos de Productos</a>
                            <a href="{{ route('statusproduct.create' )}}" class="list-group-item"><span class=""></span> Agregar Bodegas</a>
                            <a href="{{ url('/stock' )}}" class="list-group-item"><span class=""></span> Agregar Stock</a>
                            <a href="{{ url('/rusuario' )}}" class="list-group-item"><span class=""></span> Agregar Usuarios</a>
                        @endif
                        <a href="{{ url('/CHStatus' )}}" disabled class="list-group-item"><span class=""></span> Cambiar Estado de Producto</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
