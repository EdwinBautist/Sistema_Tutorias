<?php

namespace App\Imports;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Override;

class AlumnoImport implements ToModel, WithHeadingRow, WithValidation, WithSkipDuplicates
{
    public function model(array $row): Model|null
    {
        return new Alumno([
            //
            'matricula' => $row['Matricula'],
            'curp' => $row['CURP'],
            'nombre' => $row['Nombre'],
            'apell_paterno' => $row['Apellido Paterno'],
            'apell_materno' => $row['Apellido Materno'],
            'semestre' => $row['Semestre'],
            'carrera' => $row['Carrera'],
            'estatus' => $row['Estatus'] 
        ]);
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
}
