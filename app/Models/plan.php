<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
   protected $fillable = ['nome','url','preco','descricao'];

   public function search($filter = null){
      $resultado = $this
                    ->where('nome','LIKE',"%{$filter}%")
                    ->orWhere('descricao','LIKE',"%{$filter}%")
                    ->paginate();
                    return $resultado;
   }
}
