<?php

use Illuminate\Database\Seeder;
use App\Receta;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Receta::truncate();

        Schema::enableForeignKeyConstraints();

        factory(Receta::class)->create([
            'id' => 1,
            'nombre' => 'Masa de pizza',
            'tiempo' => 20,
            'personas' => 4,
        ]);
    }
}
