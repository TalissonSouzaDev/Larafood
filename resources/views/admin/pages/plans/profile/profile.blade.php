@extends('adminlte::page')

@section('title', "Permissão do perfil")

@section('content_header')
    <h1>Plano do Perfil  {{$plan->name}} <a href="{{route("plan.profile.available",[$plan->id])}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("plan.index")}}">Perfil</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    
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
                @foreach ($profile as $profiles)
                <tr>
                    <td>{{$profiles->name}}</td>
                    <td>
                     <a href="{{route('plan.profile.detach',[$plan->id,$profiles->id])}}" class="btn btn-danger">Desvincular</a>
                    
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
