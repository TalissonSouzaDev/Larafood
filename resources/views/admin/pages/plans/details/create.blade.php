@extends("adminlte::page")

@section("title","Adicionar novo detalhe ao plano {$plan->name}")
@section("content_header")
    <h1>Adicionar novo detalhe ao plano {{$plan->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
        @include("admin.alert.index")
            <form action="{{route("detail.plan.create",$plan->url)}}" class="form">
                @csrf
                @include("admin.pages.plans.details._partial.form")
            </form>
            
        </div>

    </div>
@stop