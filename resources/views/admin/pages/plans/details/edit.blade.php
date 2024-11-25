@extends("adminlte::page")

@section("title","Atualizar detalhe {$detail->name} do plano {$plan->name}")
@section("content_header")
    <h1>Atualizar detalhe {{$detail->name}} do plano {{$plan->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
        @include("admin.alert.index")
            <form action="{{route("detail.plan.update",[$plan->url,$detail->id])}}" class="form">
                @csrf
                @method("PUT")
                @include("admin.pages.plans.details._partial.form")
            </form>
            
        </div>

    </div>
@stop