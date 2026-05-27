<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'Administrador';
    protected $primaryKey = 'id_admin';
    public $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = ['id_admin', 'nombre', 'apell_paterno', 'apell_materno', 'correo'];
    
    // Relación con Auth
    public function auth()
    {
        return $this->hasOne(Auth::class, 'id_admin', 'id_admin');
    }
}
