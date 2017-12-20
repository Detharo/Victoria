@extends('layouts.app')

@section('content')
    <div class="container">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Nuevos Usuarios</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('createUser') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!--------------------------------- NOMBRE DE USUARIO ------------------------------------------->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Usuario</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" placeholder="usuario@donagustin.cl" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!--------------------------------- RUT ------------------------------------------->
                            <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                                <label for="rut" class="col-md-4 control-label">RUT</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" maxlength="12" class="form-control" name="rut" value="{{ old('rut') }}" required autofocus>

                                    @if ($errors->has('rut'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!--------------------------------- PASSWORD ------------------------------------------->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!--------------------------------- CONFIRMAR PASSWORD ------------------------------------------->
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
<!---------------------------------------------TIPO DE USUARIO---------------------------------------------------->
                            <div class="form-group{{ $errors->has('type_user') ? ' has-error' : '' }}">
                                <label for="type_user" class="col-md-4 control-label">Tipo Usuario:</label>
                                <div class="col-md-6">
                                    <select name="type_user" id="" class="form-control">
                                        <option value="">Seleccione Tipo...</option>
                                        @foreach($typeUser as $type)
                                            <option value="{{ $type->TUS_id }}"> {{$type->TUS_description}} </option>
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
                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                        </div>
                        <!----------LISTADO DE USUARIOS-------->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Usuarios Registrados</div>
                                    <div class="panel-body">
                                        <table id="usuarios-table" class="table table-striped">
                                            <thead>
                                            <tr>

                                                <td>ID</td>
                                                <td>Nombre</td>
                                                <td>Rut</td>
                                                <td>Email</td>
                                                <td>Tipo Usuario</td>
                                                <td>Operaciones</td>
                                            </tr>
                                            </thead>
                                        </table>
                                        <a href="{{ url('/home' )}}" ><span class=""></span>

                                            <button  class="btn btn-success">Atrás</button>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="modal_editar" role="dialog">
                        <form class="form-horizontal" method="POST" action="{{ route('editar_usuario') }}">
                            {{ csrf_field() }}
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Editar Usuario </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Nombre">Nombre:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="edit_name" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Rut">Rut:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="edit_rut" name="rut" value="{{ old('rut') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Email">Email:</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" id="edit_email" name="email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_edit" id="id_modificar" value="" >


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script src="{{ asset('js/stock/user.js') }}"></script>
                </div>
            </div>
        </div>
    </div>

@endsection