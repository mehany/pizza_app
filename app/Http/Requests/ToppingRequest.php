<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToppingRequest extends FormRequest
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
        if($this->request->has('topping')) {
            return [
                'topping.name' => 'required|max:255'
            ];
        }
        return [
            'name' => 'required|unique:toppings|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'topping.name.required' => 'A name is required for a topping',
            'name.required' => 'A name is required for a topping',
            'name.unique'  => 'A topping exists already with this name',
        ];
    }
}
