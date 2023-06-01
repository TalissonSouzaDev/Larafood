@extends('adminlte::page')

@section('title', 'Plan')

@section('content_header')
    <h1>plano <a href="{{route("plan.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("plan.index")}}">Planos</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      @include('admin.pages.plans.filter')
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th style="position:relative;left:330px">Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($plan as $plans)
                <tr>
                    <td>{{$plans->name}}</td>
                    <td>{{number_format($plans->price,2,',','.')}}</td>
                    <td style="position:relative;left:300px">
                        <a href="{{route('plan.profile',[$plans->id])}}" class="btn btn-info"><i class="fas fa-lock"></i></a>
                        <a href="{{route('plan.detail.index',[$plans->url])}}" class="btn btn-primary">Details</a>
                        <a href="{{route('plan.show',[$plans->url])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('plan.edit',[$plans->url])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$plan->appends([$filter])->links()}}
           
       @else
       {{$plan->links()}}
           
       @endif
    </div>
   </div>
@stop
