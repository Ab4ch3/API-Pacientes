<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            //nos permite indiciar que queremos mostrar en nuestra respuesta
            //y tambien se le pueden cambiar nombres a las propiedades
            'id' => $this->id,
            'nombres' => Str::of($this->nombres)->upper(), //se modifica para que el resultado salga en mayusculas
            'apellidos' => Str::of($this->apellidos)->upper(),
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'dni' => $this->dni,
            'tipo_sangre' => $this->tipo_sangre,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
      public function with($request)
    {
        // Nos ayuda para colocar otros atributos ademas de loa que estamos devolviendo
        return [
            'res' => true,
        ];
    }

}
