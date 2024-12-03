@extends("adminlte::page")

@section("title","Permissões disponiveis para o perfil {$profile->name}")
@section("content_header")
    <h1>Permissões disponiveis para o perfil {{$profile->name}} <a href="{{route("profile.permission.available")}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>
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
                        <th>#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <form action="{{ route('profile.permission.attach')}}" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox" name="permissions[]" id="" value="{{$permission->id}}" />
                        </td>
                        <td>{{$permission->name}}</td>
                    </tr>  
                    @endforeach

                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                
                </form>
            </table>
        </div>
        <div class="card-footer">
            {!! $permissions->links() !!}
        </div>
    </div>
@stop