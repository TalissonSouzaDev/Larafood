@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')
    <h1>Cargo <a href="{{route("role.create")}}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    @include('admin.pages.role.filter') 
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
                @foreach ($role as $roles)
                <tr>
                    <td>{{$roles->name}}</td>
                    <td style="position:relative;left:300px">
    
                        <a href="{{route('role.show',[$roles->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('role.edit',[$roles->id])}}" class="btn btn-info">Edit</a>
                        <a href="{{route('role.permission',[$roles->id])}}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$role->appends([$filter])->links()}}
           
       @else
       {{$role->links()}}
           
       @endif
    </div>
   </div>
@stop
