<?php


use Illuminate\Database\Seeder;
use App\Comando;

class ComandoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();
        Comando::truncate();
        Schema::enableForeignKeyConstraints();

        factory(Comando::class)->create([
            'nombre' => 'Triturar',
        ]);

        factory(Comando::class)->create([
            'nombre' => 'Amasar',
        ]);

        factory(Comando::class)->create([
            'nombre' => 'Vaporera',
        ]);
        
        factory(Comando::class)->create([
            'nombre' => 'Rehogar',
        ]);

    }
}
