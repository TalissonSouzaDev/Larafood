@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
    <h1>Mesa <a href="{{route("table.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("table.index")}}">Mesa</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      @include('admin.pages.table.filter')
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Identificação</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($table as $tables)
                <tr>
                    <td>{{$tables->identify}}</td>
                    <td>{{$tables->description}}</td>
                    <td >
                     
                        <a href="{{route('table.show',[$tables->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('table.edit',[$tables->id])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$table->appends([$filter])->links()}}
           
       @else
       {{$table->links()}}
           
       @endif
    </div>
   </div>
@stop
