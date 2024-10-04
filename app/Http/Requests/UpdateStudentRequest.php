<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            "filiere_id" => "required|integer",
            "firstname"=> "required|string",
            "lastname"=> "required|string",
            "email"=> "required",
            "mobile"=> "required",
            
        ];
    }

    public function messages(){
        return [
            "email.required"=>"l'email est obligatoire",
            "firstname.reuired" => "Le nom de l'etudiant est requis",
            "lastname.require" => "Le prenom de l'etudiant est requis",
            "mobile.required"=>"Le numero de telephone est requis",
        ];
    }
}
