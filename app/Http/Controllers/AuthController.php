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
        
        // Buscar el usuario en la tabla Auth
        $auth = AuthModel::where('tipo', 'Admin')->first();
        
        // Verificar si existe el admin
        if (!$auth) {
            return back()->withErrors(['error' => 'No tiene acceso a esto.'])->withInput();
        }
        
        // Verificar si la matrícula coincide con id_admin
        if ($auth->id_admin !== $request->matricula) {
            return back()->withErrors(['error' => 'Matrícula incorrecta'])->withInput();
        }
        
        // Verificar la contraseña (sin hash por ahora, comparación directa)
        if ($auth->contrasena !== $request->contrasena) {
            return back()->withErrors(['error' => 'Contraseña incorrecta'])->withInput();
        }
        
        // Login exitoso
        session(['admin_id' => $auth->id_admin, 'admin' => true]);
        
        return redirect('/home')->with('success', 'Bienvenido');
    }
    
    /**
     * Cerrar sesión
     */
    public function logout()
    {
        session()->forget(['admin_id', 'admin']);
        return redirect('/');
    }
}
