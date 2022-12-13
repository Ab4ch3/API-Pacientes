<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPacienteRequest;
use App\Http\Requests\GuardarPacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Paciente::all();//el metodo trae todos los elemento de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPacienteRequest $request)
    {
        //Crea un paciente en la base de datos
        Paciente::create($request->all());
        // dd($request->nombres);
        return response()->json([
            'res' => true,
            'msg' => 'Paciente Guardado Correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente) //se le puede en vez de solicitar el id , le colocamos el modelo y le especificamos que es un paciente lo que vamos a recibir
    {
        //
        return response()->json([
            'res' => true,
            'paciente' => $paciente //nos devolvera toda la data del paciente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPacienteRequest $request, Paciente $paciente)
    {
        //
        $paciente->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Paciente Actualizado correctamente',
        ],200);//status Code
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
