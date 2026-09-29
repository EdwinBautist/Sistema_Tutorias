<?php

namespace App\Imports;

use App\Models\Alumno;
use App\Models\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlumnoImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    public int $imported = 0;

    public function prepareForValidation($data, $index)
{
    // Normalizamos la búsqueda de las claves por si varían en el Excel
    $paterno = $data['apelllido_paterno'] ?? $data['apell_paterno'] ?? $data['apellido_pater'] ?? null;
    $materno = $data['apellido_materno'] ?? $data['apell_materno'] ?? $data['apellido_mater'] ?? null;

    if (isset($data['matricula'])) {
        $data['matricula'] = strtolower(trim($data['matricula']));
    }

    if (isset($data['curp'])) {
        $data['curp'] = strtoupper(trim($data['curp']));
    }   

    if (isset($data['nombre'])) {
        $data['nombre'] = Str::transliterate(trim($data['nombre']));
    }

    if (!is_null($paterno)) {
        $data['apellido_paterno'] = Str::transliterate(trim($paterno));
    }

    if (!is_null($materno)) {
        $data['apellido_materno'] = Str::transliterate(trim($materno));
    }

    return $data;
}
    
    public function rules(): array
    {
        return [
            // Removida la regla 'lowercase' ya que se normaliza previamente en prepareForValidation
            'matricula'    => ['required', 'size:8', 'unique:Alumno,matricula'],
            'curp'         => ['required', 'size:18', 'unique:Alumno,curp', 'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z][0-9]$/'],
            'nombre'       => ['required', 'string'],
            'apellido_paterno'=> ['required', 'string'],
            'apellido_materno'=> ['required','string'],
            'semestre'     => ['required', 'integer', 'min:1', 'max:20'],
            'carrera'      => ['required'],
            'estatus'      => ['required'],
        ];
    }

    public function model(array $row): ?Model
    {
        DB::transaction(function () use ($row) {
            // Aseguramos la transformación del texto antes de insertar
            $matricula = strtolower(trim($row['matricula']));
            $curp = strtoupper(trim($row['curp']));

            Alumno::create([
                'matricula'     => $matricula,
                'correo'        => $matricula . '@umich.mx',
                'curp'          => $curp,
                'nombre'        => Str::transliterate(trim($row['nombre'])),
                'apell_paterno' => Str::transliterate(trim($row['apellido_paterno'])),
                'apell_materno' => Str::transliterate(trim($row['apellido_materno'])),
                'semestre'      => $row['semestre'],
                'carrera'       => $row['carrera'],
                'estatus'       => $row['estatus'],
                'token_qr'      => $matricula,
            ]);

            Auth::create([
                'tipo'       => 'Alumno',
                'matricula'  => $matricula,
                'contrasena' => $curp,
            ]);
        });

        $this->imported++;

        return null;
    }
}