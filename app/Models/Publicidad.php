<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    // The database table used by the model.
    protected $table = 'publicidad';
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['empresa', 'inicio', 'fin', 'imagen'];
}
