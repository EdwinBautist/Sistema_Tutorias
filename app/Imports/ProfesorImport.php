<?php

namespace App\Imports;

use App\Models\Profesor; //Modelo del profesor
use App\Models\Auth; //Modelo Auth

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\ToModel; //Laravel Excel
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Override;

class ProfesorImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    public int $imported = 0;

    public function prepareForValidation($data, $index){

    }

    public function rules(): array
    {
        return [];
    }

    public function model(array $row): Model|null
    {
        return new Profesor([
            //
        ]);
    }

    
}
