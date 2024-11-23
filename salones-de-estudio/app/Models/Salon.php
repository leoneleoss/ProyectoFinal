<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    // Definir la clave primaria personalizada
    protected $primaryKey = 'salon_id';

    // Permitir la asignación masiva para estas columnas
    protected $fillable = ['nombre', 'lugar'];

    // Indicar que la clave primaria no es autoincremental solo si fuera necesario
    public $incrementing = true;

    // Especificar el tipo de clave primaria
    protected $keyType = 'int';
}
