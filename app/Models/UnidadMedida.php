<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    // The database table used by the model.
    protected $table = 'unidades_medidas';
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['nombre'];
}
