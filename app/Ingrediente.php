<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable=['nombre'];

    public function recetas()
    {
        return $this->belongsToMany('App\Receta','ingrediente_receta');
                    
    }


}
