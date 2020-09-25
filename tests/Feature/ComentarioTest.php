<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentarioTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function ComentCreate()
    {
        $response = $this->get('comentario/create/1');

        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function ComentStore(){
        $response = $this->post('comentario/store/1');

        $response->assertStatus(302);
    }
}
