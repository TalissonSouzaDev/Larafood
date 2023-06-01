@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>Usuarios <a href="{{route("user.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("user.index")}}">Usuarios</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      @include('admin.pages.user.filter')
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($user as $users)
                <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td >
                     
                        <a href="{{route('user.show',[$users->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('user.edit',[$users->id])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$user->appends([$filter])->links()}}
           
       @else
       {{$user->links()}}
           
       @endif
    </div>
   </div>
@stop
