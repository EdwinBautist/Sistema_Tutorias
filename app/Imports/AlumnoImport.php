<?php

namespace App\Imports;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //Esta librería nos ayuda a manejar el archivo si es que tiene una cabecera con los nombres de los campos
use Maatwebsite\Excel\Concerns\WithValidation; //Vamos a implementar ciertas reglas para no insertar el archivo en crudo
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class AlumnoImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    public function prepareForValidation($data, $index){
        return $data;
    }
    
    public function rules(): array
    {
        return[
            'matricula' => ['required', 'size:8', 'unique:Alumno', 'lowercase'],
            //input: text
            'curp' => ['required', 'size:18', 'unique:Alumno', 'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z][0-9]$/'],
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

        ];
    }

    public function model(array $row): Model|null
    {
        return new Alumno([
            //
            'matricula' => $row['matricula'],
            'curp' => $row['curp'],
            'nombre' => $row['Nombre'],
            'apell_paterno' => $row['Apellido paterno'],
            'apell_materno' => $row['Apellido materno'],
            'semestre' => $row['Semestre'],
            'carrera' => $row['Carrera'],
            'estatus' => $row['Estatus'] 
        ]);
    }

    public function batchSize():int{
        return 100;
    }

    public function chunkSize():int{
        return 10;
    }

}
