<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProduct extends FormRequest
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
        return [
            'prod_name' => ['required', 'string', 'max:25'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500' ],
            'upload_file' => ['required'],
            'stock' => ['required', 'string'],
            'price' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'category required',
            'prod_name.required' => 'product required',
            'description.required' => 'description for product require ',
            'upload_file.required' => 'image required',
            'stock.required' => ' stock required',
            'price.required' => ' price required',
        ];
    }
}
