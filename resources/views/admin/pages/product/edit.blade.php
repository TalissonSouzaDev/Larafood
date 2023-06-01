@extends('adminlte::page')

@section('title', "Atualizar Produto {{$product->title}}")

@section('content_header')
    <h1>Atualizar Produto {{$product->title}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("product.update",[$product->id])}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            @method("PUT")
        @include('admin.pages.product.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop