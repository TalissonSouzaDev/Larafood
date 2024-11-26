@extends("adminlte::page")

@section("title","Perfil {{$permission->name}}")
@section("content_header")
    <h1>Detalhe do Permissão {{$permission->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
            @include("admin.alert.index")
            <ul>
                <li><strong>Nome:</strong> {{$permission->name}}</li>
                <li><strong>Descrição:</strong> {{$permission->description}}</li>
            </ul>

            <form action="{{route("permission.destroy",$permission->url)}}">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <a href="{{route("permission.index")}}" class="btn btn-info">Voltar</a>
        </div>
    </div>
@stop