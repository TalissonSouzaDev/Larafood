@extends('adminlte::page')

@section('title', "Permissão do perfil {{$plan->name}}")

@section('content_header')
    <h1>Perfil do Plano <strong>{{$plan->name}}</strong> <a href="{{route("plan.profile.available",[$plan->id])}}" class="btn btn-dark">ADD NOVA PERFIL</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("plan.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
        <form action="{{route('plan.profile.available',[$plan->id])}}" method="post" class="form form-inline">

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
              <form action="{{route('plan.profile.attach',[$plan->id])}}" method="post">
                @csrf

                @foreach ($profile as $profiles)
                <tr>
                    <td>
                        <input type="checkbox" name="profile[]" value="{{$profiles->id}}">
                    </td>
                    <td>{{$profiles->name}}</td>
                    
                 
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
       {{$profile->appends([$filter])->links()}}
           
       @else
       {{$profile->links()}}
           
       @endif
    </div>
   </div>
@stop
