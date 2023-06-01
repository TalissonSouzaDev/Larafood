<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
        $url = $this->segment(4);
        return [
            'name'=> "required|min:3|max:255|unique:plans,name,$url,url",
            'price'=> "required|regex:/^\d+(\.\d(1,2))?$/",
            'description' => "nullable|min:3|max:500"
        ];
    }


    public function messages(){
        return [

            'required' => 'Campo Obrigatorio',
            'min' => 'Minimo de Caracters 3',
            'description.max' => 'Maximo de Caracters 500',
            'name.max' => 'Maximo de Caracters 100',
            
    
        ];
    }
}


