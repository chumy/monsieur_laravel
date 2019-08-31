<?php

use Illuminate\Database\Seeder;
use App\Medida;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Medida::class)->create([
            'nombre' => 'gramos',
            'abr' => 'gr'
        ]);

        factory(Medida::class)->create([
            'nombre' => 'mililitros',
            'abr' => 'ml'
        ]);

        factory(Medida::class)->create([
            'nombre' => 'cucharadita sopera',
            'abr' => 'c/s'
        ]);

        factory(Medida::class)->create([
            'nombre' => 'cucharadita cafe',
            'abr' => 'c/c'
        ]);
    }
}
