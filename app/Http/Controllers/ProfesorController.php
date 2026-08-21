<?php

namespace App\Http\Controllers;

use App\Models\Profesor as Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profesores.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profesores.create');
    }
    public function store(Request $request)
    {

        $profesorvalidate = $request->validate([
            'num_empleado' => ['required', 'size:10'],
            'nombre' => ['required', 'string'],
            'apell_paterno' => ['required', 'string'],
            'apell_materno' => ['required', 'string'],
            'correo' => ['required', 'regex:/^[a-z0-9]+@umich\.mx$/'],
            'tutor' => ['required', 'numeric']

        ]);

        $profesor = new Profesor;

        $profesor->num_empleado = $profesorvalidate['num_empleado'];
        $profesor->nombre = Str::transliterate($profesorvalidate['nombre']);
        $profesor->apell_paterno = Str::transliterate($profesorvalidate['apell_paterno']);
        $profesor->apell_materno = Str::transliterate($profesorvalidate['apell_materno']);
        $profesor->correo = $profesorvalidate['correo'];
        $profesor->tutor = $profesorvalidate['tutor'];

        $profesor->save();

        return view('profesores.create');

    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
