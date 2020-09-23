<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // The database table used by the model.
    protected $table = 'productos';
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['bodega_id', 'categoria_id', 'unidad_id', 'codigo', 'nombre', 'descripcion', 'marca', 'precio', 'stock_minimo', 'imagen'];
}
