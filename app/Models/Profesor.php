<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'Profesor';
    protected $primaryKey = 'num_empleado';
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['num_empleado', 'nombre', 'apell_paterno', 'apell_materno', 'correo', 'tutor'];

    //Tal vez algún método para normalizar los nombres (quitar acentos)

}
