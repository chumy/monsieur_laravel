<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Receta;

class RecetasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function recetas_ruta()
    {
        $response = $this->get('/recetas');
        $response->assertStatus(200);
    }

    /** @test */
    public function sin_recetas()
    {
        $response = $this->get('/recetas')
        ->assertSee('Listado de recetas')
        ->assertSee('No hay recetas registradas')
        ->assertStatus(200);
    }

    /** @test */
    function it_shows_the_recetas_list()
    {
        factory(Receta::class)->create([
            'nombre' => 'Receta 1',
            'personas' => 4,
            'tiempo' => 20,
        ]);

        $this->get('/recetas')
            ->assertStatus(200)
            ->assertSee('Listado de recetas')
            ->assertSee('Receta 1');
    }
}
