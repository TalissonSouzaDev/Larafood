@extends("adminlte::page")

@section("title","Cadastrar Novo Plano")
@section("content_header")
    <h1>Cadastrar Novo Plano</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
        @include("admin.alert.index")
            <form action="" class="form">
                @csrf
                @include("admin.pages.plans._partial.form")
            </form>
            
        </div>

    </div>
@stop