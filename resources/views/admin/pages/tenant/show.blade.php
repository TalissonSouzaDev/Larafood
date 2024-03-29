@extends('adminlte::page')

@section('title', "Preview do Empresa {$tenant->name}")

@section('content_header')
    <h1>Preview da Empresa {{$tenant->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>Empresa: </b>{{$tenant->name}}</li>
            <li><b>CNPJ: </b>{{$tenant->cnpj}}</li>
            <li><b>E-mail: </b>{{$tenant->email}}</li>
            <li><b>Empresa: </b>{{$tenant->name}}</li>
            <li><b>Plano: </b>{{$tenant->plan->name}}</li>
            <li><b>Valor do Plano: </b>R$ {{number_format($tenant->plan->price,2,','.'.')}}</li>
            <li><b>Expira em : </b>{{$tenant->expire_at != "" ? date('d/m/Y',strtotime($tenant->expire_at)) : "Não tem data"}}</li>
        
            <li><b>Image: </b> <br> <img src="{{$tenant->image != "" ? url("storage/$tenant->image") : url("img/imgtenant.jpeg")}}" alt="{{$tenant->name}}" style="max-width:200px"></li>
        
            
        </ul>
    </div>


   </div>
@stop
