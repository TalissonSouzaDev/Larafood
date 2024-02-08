@extends('adminlte::page')

@section('title', "Permissão do perfil")

@section('content_header')
    <h1>Permissão do Perfil  {{$profile->name}} <a href="{{route("profile.permission.available",[$profile->id])}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("permission.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    {{--@include('admin.pages.profile.filter') --}}
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
                @foreach ($permission as $permissions)
                <tr>
                    <td>{{$permissions->name}}</td>
                    <td>
                     <a href="{{route('profile.permission.detach',[$profile->id,$permissions->id])}}" class="btn btn-danger">Desvincular</a>
                    
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
