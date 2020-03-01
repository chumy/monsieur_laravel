<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(ActionSeeder::class);
        $this->call(MedidaSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(RecetaSeeder::class);
        //$this->call(PasoSeeder::class);
        //$this->call(RelIngPasoSeeder::class);
    }
}
