<?php

namespace App\Http\Controllers;
use App\Models\Alumno as Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumnovalidate = $request->validate([
            'matricula' => ['required', 'size:8', 'unique:Alumno~'],
            'correo' => ['required', 'regex:/^[a-z0-9]+@umich\.mx$/'],
            'nombre' => ['required', 'string'],
            'apell_paterno' => ['required', 'string'],
            'apell_materno' => ['required', 'string'],
            'semestre' => ['required','integer'],
            'carrera' => ['required'],
            'estatus' => ['required']
        ]);

        $alumno = new Alumno;
        $alumno->matricula = $alumnovalidate['matricula'];
        $alumno->correo = $alumnovalidate['correo'];
        $alumno->nombre = Str::transliterate($alumnovalidate['nombre']);
        $alumno->apell_paterno = Str::transliterate($alumnovalidate['apell_paterno']);
        $alumno->apell_materno = Str::transliterate($alumnovalidate['apell_materno']);
        $alumno->semestre = $alumnovalidate['semestre'];
        $alumno->carrera = $alumnovalidate['carrera'];
        $alumno->estatus = $alumnovalidate['estatus'];
        $alumno->token_qr = $alumnovalidate['matricula'];        
        
        $alumno->save();

        return view('alumnos.create');
    }

    /**
     * Display the specified resource.
     */
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

    //public function addcsv(string $id)
}
