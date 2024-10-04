<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email:users',
            'password'=>'required|min:8|max:12'
        ];
    }

    public function message(){
        return[
            'name|required'=>'Votre nom est obligatoire',
            'email|required' =>'Votre email est obligatoire',
            'password|required' =>'Votre mot de passe est obligatoire',
            'password|min:8' =>'Votre mot de passe doit contenir au minimum 8 caracteres',
            'password|max:12' =>'Votre mot de passe doit contenir au maximum 12 caracteres',

        ];
    }
}
