<?php

namespace App\Imports;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class ProfesorImport implements ToModel
{
    public function model(array $row): Model|null
    {
        return new Profesor([
            //
        ]);
    }
}
