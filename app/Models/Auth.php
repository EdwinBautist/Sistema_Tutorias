<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'Auth';
    public $timestamps = false;
    
    protected $fillable = ['tipo', 'id_admin', 'num_empleado', 'matricula', 'contrasena'];
    
    // Relaciones
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_admin', 'id_admin');
    }
    
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'num_empleado', 'num_empleado');
    }
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'matricula', 'matricula');
    }
}
