@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Categoria <a href="{{route("category.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("category.index")}}">Categoria</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      @include('admin.pages.category.filter')
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($category as $categorys)
                <tr>
                    <td>{{$categorys->name}}</td>
                    <td>{{$categorys->description}}</td>
                    <td >
                     
                        <a href="{{route('category.show',[$categorys->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('category.edit',[$categorys->id])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$category->appends([$filter])->links()}}
           
       @else
       {{$category->links()}}
           
       @endif
    </div>
   </div>
@stop
