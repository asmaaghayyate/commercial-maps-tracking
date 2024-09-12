<?php

namespace App\Http\Requests\Admin\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EditCommercialRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,client,commercial',
            'genre' => 'required|string|max:255',
            'type_deplacement' => 'required|string|max:255',
            'identite' => 'required|string|max:255',
            'adresse' => 'required|string|max:1000',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_contrat' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ];
    }
}
