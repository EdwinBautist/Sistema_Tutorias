<?php

namespace App\Http\Controllers;

use App\Models\Auth as AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function showLogin()
    {
        return view('login');
    }
    
    /**
     * Procesar el login
     */
    public function login(Request $request)
    {
        $request->validate([
            'matricula' => 'required|string',
            'contrasena' => 'required|string',
        ], [
            'matricula.required' => 'La matrícula es requerida',
            'contrasena.required' => 'La contraseña es requerida',
        ]);

        $input = $request->matricula;
        
        // Buscar el usuario en la tabla Auth
        $auth = AuthModel::where('id_admin', $input)
        ->orWhere('num_empleado', $input)
        ->orWhere('matricula', $input)
        ->first();

        //dd($auth->tipo);
        
        // Verificar si existe algún usuario
        if (!$auth) {
            return back()->withErrors(['error' => 'Matrícula incorrecta.'])->withInput();
        }
        
        // Verificar la contraseña (sin hash por ahora)
        if ($auth->contrasena !== $request->contrasena) {
            return back()->withErrors(['error' => 'Contraseña incorrecta'])->withInput();
        }

        //Guardamos en el arreglo session el tipo de usuario que tenmos
        session([
            'user_tipo' => $auth->tipo,
            'user_id' => $input,
        ]);
        
        // Checamos el login
        if($auth->tipo === 'Admin'){
            session(['admin_id' => $auth->id_admin, 'admin'=>true]);
            return redirect('/home')->with('success', 'Bienvenido');
        }elseif($auth->tipo === 'Alumno'){
            session(['alumno_id' => $auth->matricula, 'alumno' =>true]);
            return redirect('/alumno')->with('success', 'Hola Alumno');
        }elseif($auth->tipo === 'Profesor'){
            session(['num_empleado' => $auth->num_empleado, 'profesor'=> true]);
            return redirect('/profesor')->with('success','Hola, Profesor');
        }
        
    }
    
    /**
     * Cerrar sesión
     */
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
