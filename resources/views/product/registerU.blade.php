@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Nuevos Usuarios</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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
                        <p ><h3 >Usuarios Registrados</h3></p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="active">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>RUT</th>
                                <th>Email</th>
                                <th>Tipo</th>


                            </tr>
                            </thead>
                            <tbody>
                        @foreach($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="col-lg-12">{{ $user->name }}</td>
                                <td class="col-lg-12">{{ $user->rut }}</td>
                                <td class="col-lg-12">{{ $user->email }}</td>
                                @foreach($typeUser as $type)
                                @if($user->TUS_id == $type->TUS_id)<td class="col-lg-12">{{ $type->TUS_description}}@endif</td>
                                @endforeach


                                <td class="col-md-2">
                                    <form  method="POST" action="{{ route('statusproduct.update',['$StatusProduct'=>$user->id])  }}">


                                        <button type="submit" class="btn btn-info">Editar</button>
                                    </form>
                                </td>
                                <td class="col-md-2">
                                    <form action="{{ route('statusproduct.destroy',['StatusProduct'=> $user->id]) }}" method="POST">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">Eliminar</button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
