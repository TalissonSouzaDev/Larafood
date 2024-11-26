@extends("adminlte::page")

@section("title","Atualizar Perfil {{$permission->name}}")
@section("content_header")
    <h1>Atualizar o Permissão {{$permission->name}}</h1>
@stop

@section("content")
    <div class="card">
    @include("admin.alert.index")
        <div class="card-body">
            <form action="{{route("permission.update",$permission->url)}}" class="form">
                @csrf
                @method("PUT")
                @include("admin.pages.permissions._partial.form")
            </form>
            
        </div>

    </div>
@stop