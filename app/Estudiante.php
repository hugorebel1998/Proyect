<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Estudiante extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'apellidos', 'email', 'telefono', 'edad', 'grupo_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
