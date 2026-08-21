<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'Alumno';
    protected $primaryKey = 'matricula';
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['matricula', 'nombre', 'apell_paterno', 'apell_materno','correo','estatus','semestre','carrera', 'token_qr'];

    //Tal vez algún método para normalizar los nombres (quitar acentos)
}
