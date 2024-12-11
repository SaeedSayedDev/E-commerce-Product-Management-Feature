<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        return [
            'name' => [
                'string',
                'required',
                'min:2',
                'max:255',
                Rule::unique('products')
                    ->where(function ($query) {
                        return $query->where('user_id', auth()->id());
                    })
                    ->ignore(request()->route('product_id')),
            ],
            "description" => 'string|required|min:2|max:255',
            "price" => 'numeric|required|min:1',
            "quantity" => 'numeric|required|min:1',
        ];
    }
}
