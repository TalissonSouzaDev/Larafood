@extends('adminlte::page')

@section('title', "Cargo ao Usuario")

@section('content_header')
    <h1>Cargo ao Usuario  {{$user->name}} <a href="{{route("user.role.available",[$user->id])}}" class="btn btn-dark">ADD NOVO CARGO</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("role.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    {{--@include('admin.pages.user.filter') --}}
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50px">#</th>

                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($role as $roles)
                <tr>
                    <td>{{$roles->name}}</td>
                    <td>
                     <a href="{{route('user.role.detach',[$user->id,$roles->id])}}" class="btn btn-danger">Desvincular</a>
                    
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
