@extends("adminlte::page")

@section("title","Planos")
@section("content_header")
    <h1> Detalhe do Plano {{$plan->name}} <a href="{{route("plan.create")}}" class="btn btn-dark">ADD</a></h1>
@stop

@section("content")
    <div class="card">
        <div class="card-header">
            <form action="{{route("plan.search")}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placheholder="buscar por Nome" class="form-control"/>
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
                @foreach($detail as $details)
                    <tr>
                        <td>{{$details->name}}</td>
                        <td style="">
                            <a href="{{route("detail.plan.edit",[$plan->url,$details->id])}}" class="btn btn-warning">edit</a>
                            <a href="{{route("detail.plan.destroy",[$plan->url,$details->id])}}" class="btn btn-info">Ver</a>
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $detail->links() !!}
        </div>
    </div>
@stop