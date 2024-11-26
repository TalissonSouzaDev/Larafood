@extends("adminlte::page")

@section("title","Atualizar Perfil {{$profile->name}}")
@section("content_header")
    <h1>Atualizar o Perfil {{$profile->name}}</h1>
@stop

@section("content")
    <div class="card">
    @include("admin.alert.index")
        <div class="card-body">
            <form action="{{route("profile.update",$profile->url)}}" class="form">
                @csrf
                @method("PUT")
                @include("admin.pages.profiles._partial.form")
            </form>
            
        </div>

    </div>
@stop