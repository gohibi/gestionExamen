<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeExamenNoteRequest extends FormRequest
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
        "note" => "required",
        "examen_id" => "required|exists:examens,id",
        "student_id"  => "required|exists:students,id",
        ];
    }

    public function messages(){
        return[
            'note|required'=>"Veuillez rentrer obligatoirement la note obtenue",
            'examen_id|required'=>"Veuillez selectionner l'examen concerné",
            'student_id|required'=>"Veuillez selectionner l'etudiant concerné",
        ];
    }
}
