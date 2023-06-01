@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
 
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("tenant.index")}}">Empresa</a></li>
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
                    <th>Imagem</th>
                    <th>Empresa</th>
                   
                    <th>Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($tenant as $tenants)
                <tr>

                    <td><img src="{{url("storage\{$tenants->image}")}}" style="max-width:90px"></td>
                    <td>{{$tenants->name}}</td>
                   
                    <td >
                        <a href="{{route('tenant.show',[$tenants->uuid])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('tenant.edit',[$tenants->uuid])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@stop
