<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_name' => 'required|unique:products',
            'image' => 'image',
            'category' => 'required|integer',
            'product_type' => 'required|integer',
            'brand' => 'required|integer',
            'size' => 'required',
            'show_in' => 'required',

        ];
    }
}
