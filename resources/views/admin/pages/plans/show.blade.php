@extends('adminlte::page')
@section('title','detalhe do plano')



@section('content_header')
<h1>Detalhe do Plano</h1>
    
@stop   
@section('content')
<div class="card">
    <div class="card body">
        
        <ul>
            <li><strong>Nome: </strong> {{$plano->nome}}</li>
            <li><strong>Url: </strong> {{$plano->url}}</li>
            <li><strong>Preco: </strong>R$ {{number_format($plano->preco,2,",",".") }}</li>
            <li><strong> Descrição:</strong> {{$plano->descricao}}</li>

        </ul>



     <form action="{{route('plano.delete',$plano->url)}}" method="post">
         @csrf
         @method('DELETE')

         <button type="submit" class="btn btn-danger">Deleta Plano</button>
     </form>
    </div>
</div>
@endsection