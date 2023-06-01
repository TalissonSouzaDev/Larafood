<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'title' => 'required',
            'price'=> "required|regex:/^\d+(\.\d(1,2))?$/",
            'description' => "nullable|min:3|max:500",
            'image' => ['required','file',]
        ];


    }


    public function messages(){
        return [

            'required' => 'Campo Obrigatorio',
            'min' => 'Minimo de Caracters 3',
            'description.max' => 'Maximo de Caracters 500',
            'name.max' => 'Maximo de Caracters 100',
            'mimes' => 'Apenas Aceita arquivo com a extensão PNG,JPG,JPEG'
            
    
        ];
    }
}
