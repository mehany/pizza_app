<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
        if($this->request->has('pizza')) {
            return [
                'pizza.name' => 'required|max:255',
                'pizza.description' => array('Regex:/^[A-Za-z0-9 ,.]+$/')
            ];
        }
        return [
            'name' => 'required|unique:pizzas|max:255',
            'description' => array('Regex:/^[A-Za-z0-9 ,.]+$/')
        ];
    }

}
