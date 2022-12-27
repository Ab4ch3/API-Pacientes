<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Http\Requests\AccesoRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    //
     public function registro(RegistroRequest $request)
    {
        # Lo necesario para registrar el usuario
        // Generamos los nuevos usuarios
        $user = new user();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password = bcrypt($request->password); //sirve para encriptar el password

        $user->save();
        $user->roles()->attach($request->roles);//Para asignarle roles a un usuario que se va crear, en este caso el role se lo vamos a pasar de una vez con el rquest de crear usuario nuevo
        
        
        return response()->json([
            'res' => true,
            'msg' => 'Usuario Registrado'
        ],200);
    }

    public function login(AccesoRequest $request)
    {
        # Validar los usuario para crear los api tokens necesarios
        $user = User::with('roles')->where('email', $request->email)->first();
 
        #Realiza una verificacion de las crendenciales si son correctas
        if (! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'msg' => ['The provided credentials are incorrect.'],
            ]);
        }
        //Guardamos el token en una variable
        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'msg' => [
                "token"=> $token,
                "user" => $user
                ]
        ],200);
    }

    public function logout(Request $request)
    {
        # Eliminar el token otorgado al usuario
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'token' => 'Token Eliminado Correctamente'
        ],200);
    }

}
