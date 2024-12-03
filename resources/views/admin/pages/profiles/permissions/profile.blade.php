@extends("adminlte::page")

@section("title","Permissão {$permission->name}")
@section("content_header")
    <h1>Permissão {{$permission->name}}</h1>
@stop

@section("content")
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>
                        <td style="">
                            <a href="{{route("profile.permission.detach",[$profile->id,$permission->id])}}" class="btn btn-info">Desvincular</a>
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $profiles->links() !!}
        </div>
    </div>
@stop