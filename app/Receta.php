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

    public function ingredientes(){
        return $this->belongsToMany('App\Ingrediente', 'ingrediente_receta')
                    ->as('cantidades')
                    ->withPivot('cantidad' );
    }

    public function pasos(){
        return $this->hasMany('App\Paso');
    }

}
