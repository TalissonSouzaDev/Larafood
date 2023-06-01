@extends('adminlte::page')

@section('title', "Atualizar Empresa {{$tenant->name}}")

@section('content_header')
    <h1>Empresa {{$tenant->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("tenant.update",[$tenant->uuid])}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            @method("PUT")
        @include('admin.pages.tenant.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop