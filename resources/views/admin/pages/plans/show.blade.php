@extends('adminlte::page')

@section('title', "Preview do Plano {{$plan->name}}")

@section('content_header')
    <h1>Preview do Plano {{$plan->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$plan->name}}</li>
            <li><b>URL: </b>{{$plan->url}}</li>
            <li><b>PREÇO: </b>{{number_format($plan->price,2,',','.')}}</li>
            <li><b>DESCRIÇÃO: </b>{{$plan->description}}</li>
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('plan.destroy',[$plan->url])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("plan.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
