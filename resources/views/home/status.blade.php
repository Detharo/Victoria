@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Bodegas/Estado de Productos</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('statusproduct.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('STS_description') ? ' has-error' : '' }}">
                                <label for="STS_description" class="col-md-4 control-label">Nueva Bodega</label>

                                <div class="col-md-6">
                                    <input id="STS_description" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Bodega X" class="form-control" name="STS_description" value="{{ old('STS_description') }}" required autofocus>

                                    @if ($errors->has('STS_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('STS_description') }}</strong>
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
                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                        </div>
                        <!------------LISTADOD E BODEGAS----------->
                        <p ><h3 >Bodegas Registradas</h3></p>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="active">
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th></th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($StatusProduct as $prod)
                                            <tr>
                                                <td>{{ $prod->STS_id }}</td>
                                                <td class="col-lg-12">{{ $prod->STS_description }}</td>

                                                <td class="col-md-2">
                                                    <form action="{{ route('statusproduct.destroy',['StatusProduct'=> $prod->STS_id]) }}" method="POST">

                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger">Eliminar</button>

                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
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
