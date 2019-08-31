<?php

use Illuminate\Database\Seeder;
use App\Paso;

class PasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Paso::class)->create([
            'id' => 1,
            'receta_id' => 1,
            'descripcion' => 'Verter el agua y el aceite en el vaso',
            'temperatura' => 37,
            'orden' => 1,
        ]);
    }
    
}
