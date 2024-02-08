@extends('adminlte::page')

@section('title', "Permissão do perfil {{$role->name}}")

@section('content_header')
    <h1>Permissão do Perfil <strong>{{$role->name}}</strong> <a href="{{route("role.permission.available",[$role->id])}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("role.index")}}">Cargo</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
        <form action="{{route('role.permission.available',[$role->id])}}" method="post" class="form form-inline">

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
              <form action="{{route('role.permission.attach',[$role->id])}}" method="post">
                @csrf

                @foreach ($permission as $permissions)
                <tr>
                    <td>
                        <input type="checkbox" name="permission[]" value="{{$permissions->id}}">
                    </td>
                    <td>{{$permissions->name}}</td>
                    
                 
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
       {{$permission->appends([$filter])->links()}}
           
       @else
       {{$permission->links()}}
           
       @endif
    </div>
   </div>
@stop
