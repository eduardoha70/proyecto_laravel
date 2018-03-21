@extends('admin.master')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Token
        </h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            Token
        </div>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
               {{$token}}
            </div>
        </div>
    </div>
</div>

@endsection
