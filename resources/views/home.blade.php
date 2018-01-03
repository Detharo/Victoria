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
                        @if (Auth::user()->TUS_id == 1)
                        <h3>Módulo Productos</h3>
                        <a href="{{route('product.create')}}" class="list-group-item"><span class=""></span> Ingresar Productos<span><h6 class="pull-right"><i>Formulario de Ingreso de nuevos productos al sistema</i></h6></span></a>

                            <a href="{{ route('typeproduct.create' )}}" class="list-group-item"><span class=""></span> Agregar Tipos de Productos<span><h6 class="pull-right"><i>Agregar un nuevo tipo de producto</i></h6></span></a>
                            <a href="{{ url('/stock' )}}" class="list-group-item"><span class=""></span> Agregar Stock<span><h6 class="pull-right"><i>Agrega stock a un producto</i></h6></span></a>

                        <a href="{{ url('/CHStatus' )}}" disabled class="list-group-item"><span class=""></span> Cambiar Estado de Producto<span><h6 class="pull-right"><i>Cambia el estado o la posición de un producto</i></h6></span></a>
                        @endif

                            <h3>Módulo Información</h3>
                        @if (Auth::user()->TUS_id == 1) <a href="{{ url('/productos') }}" class="list-group-item"><span class=""></span> Listar Productos<span><h6 class="pull-right"><i>Muestra todos los productos registrados en el sistema</i></h6></span></a>
                        @else
                        <a href="{{ url('/productos2') }}" class="list-group-item"><span class=""></span> Listar Productos<span><h6 class="pull-right"><i>Muestra todos los productos registrados en el sistema</i></h6></span></a>
                        @endif
                            <a href="{{ url('product.vendido') }}" class="list-group-item"><span class=""></span> Listar Productos Vendidos<span><h6 class="pull-right"><i>Muestra todos los productos en estado Vendido</i></h6></span></a>
                            <a href="{{ url('product.merma') }}" class="list-group-item"><span class=""></span> Listado Merma<span><h6 class="pull-right"><i>Muestra todos los productos en estado Merma</i></h6></span></a>
                            @if (Auth::user()->TUS_id == 1) <h3>Módulo Usuarios</h3>
                        <a href="{{ route('rusuario' )}}" class="list-group-item"><span class=""></span> Agregar Usuarios<span><h6 class="pull-right"><i>Formulario de registro para nuevos empleados</i></h6></span></a>
                    @endif
                        <h3>Módulo Bodegas</h3>
                        @if (Auth::user()->TUS_id == 1)
                        <a href="{{ route('statusproduct.create' )}}" class="list-group-item"><span class=""></span> Agregar Bodegas<span><h6 class="pull-right"><i>Agregar una nueva Bodega para almacenar productos</i></h6></span></a>
                        @endif
                        <a href="{{url('product.storage1')}}" class="list-group-item"><span class=""></span> Bodega 1<span><h6 class="pull-right"><i>Sección para Raspberry en Bodega 1</i></h6></span></a>
                        <a href="{{url('product.storage2')}}" class="list-group-item"><span class=""></span> Bodega 2<span><h6 class="pull-right"><i>Sección para Raspberry en Bodega 2</i></h6></span></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
