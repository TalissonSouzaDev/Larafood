@extends('adminlte::page')
@section('title','Cadastro Novo Plano')



@section('content_header')
<h1>Cadastro de Planos</h1>
    
@stop   
@section('content')
<div class="card">
    <div class="card body">
        <form action="{{route('plano.store')}}" class="form" method="POST">
            @csrf
           @include('admin.pages.plans._parti.formulario')
           <div class="form-group">
            <button type="submit" class="btn btn-dark">Cadastrar</button>
          </div>
        </form>
    </div>
</div>
@endsection