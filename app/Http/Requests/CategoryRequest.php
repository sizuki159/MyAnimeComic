<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        return [
            'name' => 'required|unique:\App\Model\Category,name',
            'status' => ['required', Rule::in(['active', 'disabled'])],
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'name.required' => 'ngu ngoc vl',
    //         'status.required' => 'abc'
    //     ];
    // }
}
