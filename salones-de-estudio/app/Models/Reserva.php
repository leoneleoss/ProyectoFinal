<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Definir la clave primaria personalizada
    protected $primaryKey = 'reserva_id';

    // Permitir la asignación masiva para estas columnas
    protected $fillable = ['salon_id', 'fecha_reserva', 'duracion', 'nombre_alumno', 'codigo_alumno'];

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Especificar el tipo de clave primaria
    protected $keyType = 'int';

    /**
     * Relación con el modelo Salon (muchas reservas pertenecen a un salón)
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class, 'salon_id', 'salon_id');
    }
}
