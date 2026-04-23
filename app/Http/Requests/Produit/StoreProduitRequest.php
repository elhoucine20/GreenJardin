<?php

namespace App\Http\Requests\Produit;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitRequest extends FormRequest
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
            //
            'name'         => 'required|string|between:3,30',
            'prix'         => 'required|integer',
            'stock'        => 'required|integer',
            'description'  => 'required|string',
            'categorie_id' => 'required|integer',
            'image'        => 'nullable|image',

        ];
    }
}
