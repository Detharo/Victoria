@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">Mis Productos




                        <div class="col-md-12">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-stripped">
                                    <thead>
                                    <tr class="active">
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Estado/Bodega</th>

                                        <th></th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($quantityProduct as $prod)


                                        <tr>
                                            @if($id == $prod->PDT_id) <td>
                                                @foreach($product as $type)
                                                    @if($id == $type->PDT_id)  {{$type->PDT_name}} @endif
                                                @endforeach

                                            </td>@endif
                                            @if($id == $prod->PDT_id) <td>
                                                {{$prod->QTY_description}}

                                            </td>@endif
                                            @if($id == $prod->PDT_id) <td>

                                                @foreach($statusProduct as $type)
                                                    @if($prod->STS_id == $type->STS_id)  {{$type->STS_description}} @endif
                                                @endforeach

                                            </td>@endif


                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>






                            </div>
                        </div><div class="pull-left">
                            <a href="{{url('/productos')}}"><div class="btn btn-success">Atrás</div></a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
