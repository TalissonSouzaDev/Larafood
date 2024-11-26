@extends("adminlte::page")

@section("title","Perfil {{$profile->name}}")
@section("content_header")
    <h1>Detalhe do Perfil {{$profile->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
            @include("admin.alert.index")
            <ul>
                <li><strong>Nome:</strong> {{$profile->name}}</li>
                <li><strong>Descrição:</strong> {{$profile->description}}</li>
            </ul>

            <form action="{{route("profile.destroy",$profile->url)}}">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <a href="{{route("profile.index")}}" class="btn btn-info">Voltar</a>
        </div>
    </div>
@stop