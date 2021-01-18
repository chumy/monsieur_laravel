<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
    protected $fillable=['tiempo','temperatura','descripcion','velocidad','orden','receta_id', 
                            'comando_id', 'cestillo', 'atras', 'mariposa', 'cubilete'];
    
    public function receta()
    {
        return $this->belongsTo('App\Receta');               
    }

    public function ingredientes()
    {
        return $this->belongsToMany('App\Ingrediente','ingrediente_paso')
                    ->as('cantidades')
                    ->withPivot('cantidad' );              
    }

 
    
    public function comando()
    {
        return $this->belongsTo('App\Comando');               
    }
    /*
    public function comando()
    {
        return $this->hasOne('App\Comando');               
    }

    /*public function comando()
    {
        return $this->belongsTo('App\ComandoRobot','comando_paso')
                    ->as('comandos')
                    ->withPivot('velocidad','tiempo','grados' );  ;               
    }*/
}
