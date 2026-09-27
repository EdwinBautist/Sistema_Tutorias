<?php

namespace App\Http\Controllers;
use App\Models\Alumno as Alumno;
use App\Models\Auth as Auth;

//Librerías para poder normalizar y aplanar el texto.
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Librerías para poder usar Laravel Excel
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Imports\AlumnoImport;
use GrahamCampbell\ResultType\Success;

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
    public function create() //Función que devuelve la vista crear, aquella que contiene el formulario para registrar un alumno
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Función para almacenar(store) los alumnos que se vayan registrando uno a uno
    {
        $request->merge([
            'curp' => Str::upper($request->input('curp')),
        ]);

        $alumnovalidate = $request->validate([
            //input: text
            'matricula' => ['required', 'size:8', 'unique:Alumno', 'lowercase'],
            //input: text
            'curp' => ['required', 'size:18', 'unique:Alumno', 'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z][0-9]$/'], //
            //input: mail
            //'correo' => ['required', 'regex:/^[a-z0-9]+@umich\.mx$/'],
            //input: text
            'nombre' => ['required', 'string'],
            //input: text
            'apell_paterno' => ['required', 'string'],
            //input: text
            'apell_materno' => ['required', 'string'],
            //input: 
            'semestre' => ['required','integer', 'min:1', 'max:20'],
            //input text
            'carrera' => ['required'],
            //input 
            'estatus' => ['required']
        ]);

        //Instanciamos un nuevo alumno
        $alumno = new Alumno;

        $alumno->matricula = $alumnovalidate['matricula'];
        // A partir de la matrícula guardamos el correo institucional
        $alumno->correo = $alumnovalidate['matricula']."@umich.mx";
        $alumno->curp = $alumnovalidate['curp'];

        //Removemos las tíldes del nombre
        $alumno->nombre = Str::transliterate($alumnovalidate['nombre']);
        $alumno->apell_paterno = Str::transliterate($alumnovalidate['apell_paterno']);
        $alumno->apell_materno = Str::transliterate($alumnovalidate['apell_materno']);

        $alumno->semestre = $alumnovalidate['semestre'];
        $alumno->carrera = $alumnovalidate['carrera'];
        $alumno->estatus = $alumnovalidate['estatus'];
        $alumno->token_qr = $alumnovalidate['matricula'];        
        
        $alumno->save();

        $auth = new Auth;
        $auth->tipo = "Alumno";
        $auth->matricula = $alumnovalidate['matricula'];
        $auth->contrasena = $alumno->curp;

        $auth->save();

        return redirect()
        ->route('alumnos.create')
        ->with('success', 'Alumnos registrados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function import(Request $request){
        //Vamos a validar que si hayamos recibido un archivo excel o csv
        $request->validate([
        'alumimport' => ['required', 'file', 'mimes:xlsx,xls,csv'],
        ]);

        $import = new AlumnoImport;

        //Usaremos este try catch para evaluar si este archivo está corrupto, vacío o ilegible
        try{
        Excel::import($import, $request->file('alumimport'));
        }catch(\Exception $e){
            dd($e->getMessage());
        }
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
