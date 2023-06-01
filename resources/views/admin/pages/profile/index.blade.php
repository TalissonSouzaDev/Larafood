@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Perfil <a href="{{route("profile.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("profile.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    @include('admin.pages.profile.filter') 
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
                @foreach ($profile as $profiles)
                <tr>
                    <td>{{$profiles->name}}</td>
                    <td style="position:relative;left:300px">
                        <a href="{{route('profile.edit',[$profiles->id])}}" class="btn btn-info">Edit</a>
                        <a href="{{route('profile.show',[$profiles->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('profile.permission',[$profiles->id])}}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                    
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$profile->appends([$filter])->links()}}
           
       @else
       {{$profile->links()}}
           
       @endif
    </div>
   </div>
@stop
