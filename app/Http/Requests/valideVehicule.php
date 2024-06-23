<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valideVehicule extends FormRequest
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
            'modele' => ['required', 'min:3'],
            'marque' => ['required', 'min:3'],
            'type' => ['required', 'min:3'],
            'couleur' => ['required','min:3'],
            'prix' => ['required','integer', 'min:20'],
            'visuel' => ['required', 'max:3000'],
            'annee' => ['required', 'min:4','max:4'],
            'document' => ['required','max:3000'],
        ];
    }
}
