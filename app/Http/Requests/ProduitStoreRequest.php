<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'libelle' => ['required', 'string'],
            'marque' => ['required'],
            'prix' => ['required', 'numeric'],
            'stock' => ['required', 'numeric', 'min:1', 'max:4'],
            'image' => ['image','nullable'],
        ];
    }
}
