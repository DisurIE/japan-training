<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_the_404_code(): void
    {
        $response = $this->get('/404');

        $response->assertStatus(404);
    }
    public function test_the_redicrect_create_update_kanji(): void
    {
        $responseCreate = $this->get('/kanjis/create');
        $responseUpdate = $this->get('/kanjis/edit/1');

        $responseCreate->assertRedirect('/login');
        $responseUpdate->assertRedirect('/login');
    }
}
