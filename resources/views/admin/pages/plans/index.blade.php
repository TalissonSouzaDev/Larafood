@extends('adminlte::page')
@section('title','AdmLarafood')



@section('content_header')

<ol class="breadcrumb">
    <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li  class="breadcrumb-item" class="active"><a href="{{route('plano.index')}}">Planos</a></li>
</ol>
<h1>Planos <a href="{{route('plano.create')}}" class="btn btn-dark">Novo Plano</a></h1>
    
@stop   
@section('content')
<div class="card">
    <div class="card-header"><form action="{{route('plano.search')}}" class="form form-inline" method="POST">
    @csrf
    <input type="text" name="filter" class="control" placeholder="Filtrar plano">  
    <button type="submit" class="btn btn-dark">Filtrar</button>  
    </form></div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    
                    <th width="120">Ação</th>
                </tr>
            </thead>
            @foreach ($planos as $plano)
            <tbody>
                <tr>
                    <td>{{$plano->nome}}</td>
                    <td>R$ {{number_format($plano->preco,2,",",".") }}</td>
                    <td><a href="{{ route('plano.edit',$plano->url) }}"><button class="btn btn-info">Editar</button></a></td>
                    <td><a href="{{ route('plano.show',$plano->url) }}"><button class="btn btn-warning">Visualizar</button></a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
     

            
        
    </div>
    <div class="card-footer">

        {!! $planos->links() !!}
    </div>
</div>
    
@stop   


