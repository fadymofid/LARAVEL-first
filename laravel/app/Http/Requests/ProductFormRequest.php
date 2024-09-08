<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'info' => 'required',
            'price' => 'required|numeric',
        ];

        if ($this->isMethod('post') && $this->routeIs('products.store')) {
            $rules['images'] = 'required|array';
            $rules['images.*'] = 'required|mimes:jpeg,png,jpg,gif,svg';
        }

        return $rules;
    }
}
