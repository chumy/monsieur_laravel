<?php

use Illuminate\Database\Seeder;
use App\RelIngPaso;

class RelIngPasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RelIngPaso::class)->create([
            'paso_id' => 1,
            'cantidad' => 200,
            'medida_id' => 2,
            'ingrediente_id' => 3,
        ]);
        
        factory(RelIngPaso::class)->create([
            'paso_id' => 1,
            'cantidad' => 50,
            'medida_id' => 2,
            'ingrediente_id' => 4,
        ]);
    }
}
