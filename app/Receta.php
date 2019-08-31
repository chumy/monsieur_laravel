<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'personas', 'tiempo',
    ];

}
