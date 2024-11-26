@extends("adminlte::page")

@section("title","Perfil")
@section("content_header")
    <h1>Perfils <a href="{{route("profile.create")}}" class="btn btn-dark">ADD</a></h1>
@stop

@section("content")
    <div class="card">
        <div class="card-header">
            <form action="{{route("profile.search")}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placheholder="Nome, Preço o descrição" class="form-control"/>
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                @foreach($profile as $profiles)
                    <tr>
                        <td>{{$profiles->name}}</td>
                        <td style="">
                            <a href="{{route("detail.profile.index",$profile->id)}}" class="btn btn-info">Detalhes</a>
                            <a href="{{route("profile.show",$profiles->id)}}" class="btn btn-info">Ver</a>
                            <a href="{{route("profile.edit",$profiles->id)}}" class="btn btn-warning">edit</a>
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $profile->links() !!}
        </div>
    </div>
@stop