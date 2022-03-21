@extends('adminlte::page')
@section('title','Atualizar Plano')



@section('content_header')
<h1>Atualizar Planos</h1>
    
@stop   
@section('content')
<div class="card">
    <div class="card body">
        <form action="{{route('plano.update',$plano->url)}}" class="form" method="POST">
            @csrf
            @method('PUT')
           @include('admin.pages.plans._parti.formulario')

           <div class="form-group">
            <button type="submit" class="btn btn-dark">Atualizar</button>
          </div>
        </form>
    </div>
</div>
@endsection