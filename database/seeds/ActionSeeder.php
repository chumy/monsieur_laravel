<?php

use App\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        factory(Action::class)->create([
            'nombre' => 'Preparacion',
        ]);

        factory(Action::class)->create([
            'nombre' => 'Hornear',
        ]);

        factory(Action::class)->create([
            'nombre' => 'Amasar',
        ]);
        factory(Action::class)->create([
            'nombre' => 'Elaborar',
        ]);
        factory(Action::class)->create([
            'nombre' => 'Batir',
        ]);
        factory(Action::class)->create([
            'nombre' => 'Programar',
        ]);


    }
}
