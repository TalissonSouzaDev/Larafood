@extends("adminlte::page")

@section("title","Atualizar Plano {{$plan->name}}")
@section("content_header")
    <h1>Atualizar Plano {{$plan->name}}</h1>
@stop

@section("content")
    <div class="card">
    @include("admin.alert.index")
        <div class="card-body">
            <form action="{{route("plan.update",$plan->url)}}" class="form">
                @csrf
                @method("PUT")
                @include("admin.pages.plans._partial.form")
            </form>
            
        </div>

    </div>
@stop