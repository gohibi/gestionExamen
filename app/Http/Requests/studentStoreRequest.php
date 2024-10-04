<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentStoreRequest extends FormRequest
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
            "filiere_id" => "required|integer|exists:filieres,id",
            "firstname"=> "required|string",
            "lastname"=> "required|string",
            "email"=> "required|unique:students,email",
            "mobile"=> "required|unique:students,mobile",
        ];
    }

    public function messages(){
        return [
            "email.required"=>"l'email est obligatoire",
            "email.unique"=> "Cet email est déjà utilsé",
            "mobile.required"=>"Le numero de telephone est requis",
            "mobile.unique"=> "Le numero de telephone est deja pris",
        ];
    }
}
