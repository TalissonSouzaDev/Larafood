<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(3);
   
        return [
            'name'=>"required|min:3|max:100|unique:profiles,name,{$id},id",
            'description'=>'nullable|min:3|max:500'
        ];
    }

    public function messages(){
        return [

            'required' => 'Campo Obrigatorio',
            'min' => 'Minimo de Caracters 3',
            'max' => 'Maximo de Caracters 100',
            'unique'=> 'Ops ja existir Perfil com esse nome tente outro nome'
            
    
        ];
    }
}
