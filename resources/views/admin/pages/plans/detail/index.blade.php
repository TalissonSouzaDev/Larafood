@extends('adminlte::page')

@section('title', "Detalhe do plano")

@section('content_header')
    <h1>Detalhe do plano {{$plan->name}} <a href="{{route("plan.detail.create",[$plan->url])}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route("plan.index")}}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{route("plan.detail.index",[$plan->url])}}">{{$plan->name}}</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      <h3>Detalhes do Plano {{$plan->name}}</h3>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="position:relative;left:300px">Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($detail as $details)
                <tr>
                    <td>{{$details->name}}</td>
                  
                    <td style="position:relative;left:300px" >
                       
                        <a href="{{route('plan.detail.edit',[$plan->url,$details->id])}}" class="btn btn-info">Edit</a>
                        <form action="{{route("plan.detail.destroy",[$plan->url,$details->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Excluir</button>
                        </form>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">

       {{$detail->links()}}
           
    </div>
   </div>
@stop
