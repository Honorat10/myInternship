<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraineeRequest extends FormRequest
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
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'service' => 'required|string|max:255',
            'type_stage' => 'required|in:academique,professionnel',
            'ecole' => 'nullable|string|max:255', // École non obligatoire
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // CV non obligatoire
            'lettre' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom_complet.required' => 'Le champ "Nom complet" est obligatoire.',
            'nom_complet.string' => 'Le champ "Nom complet" doit être une chaîne de caractères.',
            'nom_complet.max' => 'Le champ "Nom complet" ne peut pas dépasser 255 caractères.',
            
            'email.required' => 'Le champ "Email" est obligatoire.',
            'email.email' => 'Veuillez fournir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            
            'service.required' => 'Le champ "Service" est obligatoire.',
            'service.string' => 'Le champ "Service" doit être une chaîne de caractères.',
            'service.max' => 'Le champ "Service" ne peut pas dépasser 255 caractères.',
            
            'type_stage.required' => 'Veuillez sélectionner un type de stage.',
            'type_stage.in' => 'Le type de stage sélectionné est invalide.',
            
            'ecole.string' => 'Le champ "École" doit être une chaîne de caractères.',
            'ecole.max' => 'Le champ "École" ne peut pas dépasser 255 caractères.',
            
            'cv.file' => 'Le CV doit être un fichier valide.',
            'cv.mimes' => 'Le CV doit être au format PDF, DOC ou DOCX.',
            'cv.max' => 'Le CV ne peut pas dépasser 2 Mo.',
            
            'lettre.required' => 'Le champ "Lettre de demande" est obligatoire.',
            'lettre.file' => 'La lettre de demande doit être un fichier valide.',
            'lettre.mimes' => 'La lettre de demande doit être au format PDF, DOC ou DOCX.',
            'lettre.max' => 'La lettre de demande ne peut pas dépasser 2 Mo.',
        ];
    }
}
