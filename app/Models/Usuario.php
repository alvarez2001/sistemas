<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mvc_usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'correo',
        'imagen',
        'nickname',
        'password',
        'rol'
    ];

    public function Rol()
    {
        return $this->belongsTo('App\Models\Rol', 'rol');
    }
}