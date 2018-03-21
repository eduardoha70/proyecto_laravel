@extends('admin.master')

@section('estilos')
    <style type="text/css">
        .columna{
            width: 90%;
        }
        .delete{
            cursor: pointer;
            font-size: 18px;
        }
    </style>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Registros de token
        </h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-11">
                Lista token activos
            </div>
            <div class="col-lg-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Crear token
                </button>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <th class="columna">Nombre</th>
                        <th>Accion</th>
                    </thead>
                    <tbody>
                    @forelse($token as $t)
                        <tr>
                            <td>{{$t->name}}</td>
                            <td>
                                <form action="{{ route('token.destroy', $t->id) }}"  method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No hay registros</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('token.store') }}" method="POST" >
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Formulario token</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="token">Nombre token:</label>
                    <input type="text" id="token" name="token_name" class="form-control">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
