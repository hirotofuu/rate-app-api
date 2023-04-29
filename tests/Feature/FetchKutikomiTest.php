<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchKutikomiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->json('GET', 'api/showJugyo/1', ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
