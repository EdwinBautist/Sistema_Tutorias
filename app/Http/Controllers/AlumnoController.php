<?php
namespace App\Http\Controllers;
use App\Models\Alumno as Alumno;
use App\Models\Auth as Auth;

//Librerías para poder normalizar y aplanar el texto.
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

// Librerías para poder usar Laravel Excel
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumnoImport;

class AlumnoController extends Controller
{
    public function index(Request $request) //Función que hace una consulta para guardar el resultado y posteriormente listar a los alumnos 
    {
        $texto = $request->get('texto');

        // Si hay texto busca por coincidencia; si no hay texto, trae todos los alumnos
        $alumnos = Alumno::when($texto, function ($query, $texto) {
        return $query->where('nombre', 'like', $texto . '%')
                     ->orWhere('matricula', 'like', $texto . '%')
                     ->orWhere('apell_paterno', 'like', $texto . '%')
                     ->orWhere('correo', 'like', $texto . '%');
        })->paginate(10);

        // Si es petición AJAX/Fetch (del buscador), devuelve solo la tabla
        if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'html' => view('alumnos.index', compact('alumnos'))->fragment('tabla-alumnos')
        ]);
    }

        // Carga normal de la página
        return view('alumnos.index', compact('alumnos'));
    }

    public function create() //Función que devuelve la vista crear, aquella que contiene el formulario para registrar un alumno
    {
        //return view('alumnos.create');
    }

    public function store(Request $request) //Función para almacenar(store) los alumnos que se vayan registrando uno a uno
    {
        $request->merge([
            'matricula' => Str::lower($request->input('matricula')),
        ]);

        $request->merge([
            'curp' => Str::upper($request->input('curp')),
        ]);

        $alumnovalidate = $request->validateWithBag('individualform', [
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

        if ($request->wantsJson()) {
            $alumnos = Alumno::paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Alumno registrado correctamente.',
                'html' => view('alumnos.index', compact('alumnos'))->fragment('tabla-alumnos'),
            ]);
        }

        return redirect()
        ->route('alumnos.index')
        ->with('success', 'Alumnos registrados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    public function import(Request $request)
    {
    // Validamos el archivo enviado
    $request->validate([
        'alumimport' => ['required', 'file', 'mimes:xlsx,xls,csv'],
    ]);

    $import = new AlumnoImport;

    try {
        Excel::import($import, $request->file('alumimport'));
    } catch (\Exception $e) {
        // En caso de error de lectura, formato o base de datos
        if($request->wantsJson()){
        return response()->json([
            'success' => false,
            'message' => 'Error al procesar el archivo: '.$e->getMessage()
        ], 422);
        }
        return back()->with('error', 'Error al procesar el archivo: ' . $e->getMessage());
    }

    // Check para saber si hubo errores omitidos por SkipsFailures / SkipsErrors
    $failures = $import->failures();
    $errors   = $import->errors();

    if($request->wantsJson() || $request->ajax()){
        $alumnos = Alumno::paginate(10);
        $failureDetails = $failures->map(fn ($failure) => [
            'row' => $failure->row(),
            'attribute' => $failure->attribute(),
            'errors' => $failure->errors(),
            'values' => $failure->values(),
        ])->values();
        $errorDetails = $errors->map(fn ($error) => $error->getMessage())->values();
        $message = "{$import->imported} registros exitosos.";

        if ($failures->isNotEmpty() || $errors->isNotEmpty()) {
            $message .= ' Algunos registros no se importaron.';
        }
        
        return response()->json([
            'success'  => $failures->isEmpty() && $errors->isEmpty(),
            'message'  => $message,
            'failures' => $failureDetails,
            'errors'   => $errorDetails,
            'html'     => view('alumnos.index', compact('alumnos'))->fragment('tabla-alumnos')
        ]);
    }

    if ($failures->isNotEmpty() || $errors->isNotEmpty()) {
        return redirect()
            ->route('alumnos.index')
            ->with('failures', $failures)
            ->with('errors_import', $errors)
            ->with('warning', "{$import->imported} registros exitosos, pero algunos filas presentaron errores.");
    }

    // Redirección exitosa
    return redirect()
        ->route('alumnos.index')
        ->with('success',  "{$import->imported} registros exitosos.");
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumno::findOrFail($id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'alumno' => $alumno,
            ]);
        }

        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $request->merge([
            'curp' => Str::upper($request->input('curp')),
        ]);

        $validated = $request->validate([
            'curp' => [
                'required',
                'size:18',
                'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z][0-9]$/',
                Rule::unique('Alumno', 'curp')->ignore($alumno->matricula, 'matricula'),
            ],
            'nombre' => ['required', 'string'],
            'apell_paterno' => ['required', 'string'],
            'apell_materno' => ['required', 'string'],
            'semestre' => ['required', 'integer', 'min:1', 'max:20'],
            'carrera' => ['required'],
            'estatus' => ['required'],
        ]);

        $alumno->curp = $validated['curp'];
        $alumno->nombre = Str::transliterate($validated['nombre']);
        $alumno->apell_paterno = Str::transliterate($validated['apell_paterno']);
        $alumno->apell_materno = Str::transliterate($validated['apell_materno']);
        $alumno->semestre = $validated['semestre'];
        $alumno->carrera = $validated['carrera'];
        $alumno->estatus = $validated['estatus'];
        $alumno->save();

        Auth::where('matricula', $alumno->matricula)
            ->update(['contrasena' => $alumno->curp]);

        if ($request->wantsJson()) {
            $alumnos = Alumno::paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Alumno actualizado correctamente.',
                'html' => view('alumnos.index', compact('alumnos'))->fragment('tabla-alumnos'),
            ]);
        }

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $matricula)
    {
        Auth::where('matricula', $matricula)->delete();
        $alumno = Alumno::where('matricula',$matricula)->firstOrFail();
        $alumno->delete();

        return response()->json([
            'success' => true,
            'message' => 'Alumno eliminado con éxito'
            ], 200);
    }

    //public function addcsv(string $id)
}
