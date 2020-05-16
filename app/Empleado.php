<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = [
        'id','documento', 'nombres', 'apellidos','fecha_nac','sexo','est_civil','foto','cargo',
        'est_contra','jefe',
    ];
}
