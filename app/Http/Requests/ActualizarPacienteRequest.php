<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPacienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //Realizaremos la validaciones
            "nombres" => "sometimes",
            "apellidos" => "sometimes",
            "edad" => "sometimes",
            "sexo" => "sometimes",
            "dni" => "sometimes|unique:pacientes,dni,".$this->route('paciente')->id , //Cuando se vaya a actualizar va a verificar que nos nos permita modificar este dni o que lo repita
            "tipo_sangre" => "sometimes",
            "telefono" => "sometimes",
            "direccion" => "sometimes",
        ];
    }
}
