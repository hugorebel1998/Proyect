<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



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

    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['edad'])->age;
    }
}
