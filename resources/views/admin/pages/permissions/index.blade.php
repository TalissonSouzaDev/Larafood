@extends("adminlte::page")

@section("title","Permissão")
@section("content_header")
    <h1>Permissão <a href="{{route("permission.create")}}" class="btn btn-dark">ADD</a></h1>
@stop

@section("content")
    <div class="card">
        <div class="card-header">
            <form action="{{route("permission.search")}}" method="POST" class="form form-inline">
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
                        <th>Ações</th>
                    </tr>
                </thead>
                @foreach($permission as $permissions)
                    <tr>
                        <td>{{$permissions->name}}</td>
                        <td style="">
                            <a href="{{route("detail.permission.index",$permission->id)}}" class="btn btn-info">Detalhes</a>
                            <a href="{{route("permission.show",$permissions->id)}}" class="btn btn-info">Ver</a>
                            <a href="{{route("permission.edit",$permissions->id)}}" class="btn btn-warning">edit</a>
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $permission->links() !!}
        </div>
    </div>
@stop