@extends('layouts.app')

@section('content')
    <div class="container">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

        <div class="row">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de Productos en Merma</div>

                    <div class="col-md-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                    </div>

                    <div class="panel-body">
                        <table id="merma-table" class="table table-striped">
                            <thead>
                            <tr>

                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Cantidad</td>

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

    <script src="{{ asset('js/stock/merma.js') }}"></script>
    </div>
@endsection