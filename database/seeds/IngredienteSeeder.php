<?php

use App\Ingrediente;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Ingrediente::truncate();

        Schema::enableForeignKeyConstraints();
        
        factory(Ingrediente::class)->create([
            'nombre' => 'sal',
        ]);

        factory(Ingrediente::class)->create([
            'nombre' => 'harina de fuerza',
        ]);

        factory(Ingrediente::class)->create([
            'nombre' => 'aceite de oliva virgen extra',
        ]);

        
        factory(Ingrediente::class)->create([
            'nombre' => 'agua',
        ]);

                factory(Ingrediente::class)->create([
            'nombre' => 'levadura fresca',
        ]);

        
     
    }
}
