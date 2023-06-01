@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <h1>Permissão <a href="{{route("permission.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("permission.index")}}">Permissão</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    @include('admin.pages.permission.filter') 
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="position:relative;left:330px">Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($permission as $permissions)
                <tr>
                    <td>{{$permissions->name}}</td>
                    <td style="position:relative;left:300px">
    
                        <a href="{{route('permission.show',[$permissions->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('permission.edit',[$permissions->id])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$permission->appends([$filter])->links()}}
           
       @else
       {{$permission->links()}}
           
       @endif
    </div>
   </div>
@stop
