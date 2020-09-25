<?php

namespace Tests\Feature;

use App\Categoria;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstablecimientoTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    function EstablecimientoCreate()
    {
        $response = $this->get('establecimiento/create');

        // $response = $this->get(Categoria::class);

        // $response->assertViewIs('establecimientos.create');

        $response->assertStatus(302);

        $response->assertSee('Registrar Establecimiento');
    }
    /**
     * @test
     * @return void
     */
    function EstablecimientoStore(){
        $response = $this->post('establecimiento/store');

        $response->assertStatus(302);
    }
}
