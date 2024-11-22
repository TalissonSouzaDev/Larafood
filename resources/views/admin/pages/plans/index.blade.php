@extends("adminlte::page")

@section("title","Planos")
@section("content_header")
    <h1>Planos <a href="{{route("plan.create")}}" class="btn btn-dark">ADD</a></h1>
@stop

@section("content")
    <div class="card">
        <div class="card-header">
            <form action="{{route("plan.search")}}" method="POST" class="form form-inline">
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
                @foreach($plan as $plans)
                    <tr>
                        <td>{{$plans->name}}</td>
                        <td>{{number_format($plans->price,2,",",".")}}</td>
                        <td style="">
                            <a href="{{route("plan.show",$plans->url)}}" class="btn btn-info">Ver</a>
                            <a href="{{route("plan.edit",$plans->url)}}" class="btn btn-warning">edit</a>
                        
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop