@extends("adminlte::page")

@section("title","Plano {{$plan->name}}")
@section("content_header")
    <h1>Detalhe do Plano {{$plan->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
            @include("admin.alert.index")
            <ul>
                <li><strong>Nome:</strong> {{$plan->name}}</li>
                <li><strong>URL:</strong> {{$plan->url}}</li>
                <li><strong>Preço:</strong> {{number_format($plan->price,2,",",".")}}</li>
                <li><strong>Descrição:</strong> {{$plan->description}}</li>
            </ul>

            <form action="{{route("plan.destroy",$plan->url)}}">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <a href="{{route("plan.index")}}" class="btn btn-info">Voltar</a>
        </div>
    </div>
@stop