<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Se coloca true para usarlo
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
            "nombres" => "required",
            "apellidos" => "required",
            "edad" => "required",
            "sexo" => "required",
            "dni" => "required|unique:pacientes,dni" , //se le agrega otra validacion para verificar que en la tabla pacientes no exista otra dni igual
            "tipo_sangre" => "required",
            "telefono" => "required",
            "direccion" => "required",
        ];
    }
}
