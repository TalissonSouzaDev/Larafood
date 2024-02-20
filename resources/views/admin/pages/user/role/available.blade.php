@extends('adminlte::page')

@section('title', "Cargo ao Usuario {$user->name}")

@section('content_header')
    <h1>Cargo ao Usuario<strong>{{$user->name}}</strong> <a href="{{route("user.role.available",[$user->id])}}" class="btn btn-dark">ADD NOVO CARGO AO USUARIO</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("user.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
        <form action="{{route('user.role.available',[$user->id])}}" method="post" class="form form-inline">

            @csrf
            
            <div class="form-group">
                <input type="text" class="form-control" name="filter">
                <button class="btn btn-dark" type="submit">Busca</button>
            </div>
            </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Nome</th>
                    <th style="position:relative;left:330px">Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
              <form action="{{route('user.role.attach',[$user->id])}}" method="post">
                @csrf

                @foreach ($role as $roles)
                <tr>
                    <td>
                        <input type="checkbox" name="role[]" value="{{$roles->id}}">
                    </td>
                    <td>{{$roles->name}}</td>
                    
                 
                </tr>
                @endforeach
                <tr>
                    <td colspan="500">
                        <button class="btn btn-success">Vincular</button>
                    </td>
                </tr>
              </form>
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
