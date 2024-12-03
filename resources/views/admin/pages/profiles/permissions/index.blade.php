@extends("adminlte::page")

@section("title","Permissões do perfil {$profile->name}")
@section("content_header")
    <h1>Permissões do perfil {{$profile->name}} <a href="{{route("profile.permission.available",$profile->id)}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>
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
                        <th>Ações</th>
                    </tr>
                </thead>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td style="">
                            <a href="{{route("profile.permission.detach",[$profile->id,$permission->id])}}" class="btn btn-info">Desvincular</a>
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $permissions->links() !!}
        </div>
    </div>
@stop