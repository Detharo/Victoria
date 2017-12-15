@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default clearfix">

                    <div class="panel-heading ">Edición de Producto {{$prod->PDT_name}}</div>


                    <div class="panel-body">
                            {{Form::open(['route' => 'product.update','method' => 'PUT'])}}
                        {{ csrf_field() }}
                        <div><input type="hidden" name="_method" value="delete" />
                            {{ Form::label('name','Nombre') }}
                            {{ Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nombre Producto'])  }}
                        </div>
                        <div>
                            {{ Form::label('brand','Marca') }}
                            {{ Form::text('brand',null, ['class' => 'form-control','placeholder' => 'Marca Producto'])  }}
                        </div>
                        <div>
                            {{ Form::label('price','Precio') }}
                            {{ Form::text('price',null, ['class' => 'form-control','placeholder' => 'Precio Producto'])  }}
                        </div>
                        <div>
                            {{ Form::label('weight','Peso') }}
                            {{ Form::text('weight',null, ['class' => 'form-control','placeholder' => 'Peso Producto'])  }}
                        </div>
                        <div>
                            {{ Form::label('code','Código') }}
                            {{ Form::text('code',null, ['class' => 'form-control','placeholder' => 'Código Producto'])  }}
                        </div>
                        <div>
                            {{ Form::label('description','Descripción') }}
                            {{ Form::text('description',null, ['class' => 'form-control','placeholder' => 'Descripción Producto'])  }}
                        </div>


                        <button type="submit" class=" btn btn-default">Actualizar Producto</button>
                            {{ Form::close() }}
                    </div>
                    <div class="col-md-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <a href="{{ url('/home' )}}" ><span class=""></span>

                            <button  class="btn btn-success">Atrás</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

@endsection
