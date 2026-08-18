<?php

namespace App\Http\Controllers;
use App\Models\Alumno as Alumno;
use Illuminate\Http\Request;

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
        $alumno = new Alumno;
        $alumno->matricula = $request->input('matricula');
        $alumno->correo = $request->input('correo');
        $alumno->nombre = $request->input('nombre');
        $alumno->apell_paterno = $request->input('apell_paterno');
        $alumno->apell_materno = $request->input('apell_materno');
        $alumno->semestre = $request->input('semestre');
        $alumno->carrera = $request->input('carrera');
        $alumno->estatus = $request->input('estatus');
        
        $alumno->save();
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
}
