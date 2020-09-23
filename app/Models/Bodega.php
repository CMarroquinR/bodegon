<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    // The database table used by the model.
    protected $table = 'bodegas';
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['user_id', 'nombre', 'tipo_documento', 'numero_documento', 'razon_social', 'telefono', 'web', 'email', 'direccion'];
}
