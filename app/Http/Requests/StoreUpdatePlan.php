<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $url = $this->segment(4);
        return [
            
                "nome" => "required|min:5|max:255|",
                "preco" => 'required',
                "descricao" => 'required|min:5|max:255',
            
        ];
    }
}
