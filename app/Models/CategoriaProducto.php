<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    // The database table used by the model.
    protected $table = 'categorias_productos';
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['nombre'];
}
