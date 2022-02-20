<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:30',
            'apellidos' => 'required|min:4|max:45',
            'correo_electronico' => 'required|email|unique:estudiantes,email',
            'teléfono' => 'min:10|max:10|required',
            'fecha_nacimiento' => 'required',

        ];
    }
}
