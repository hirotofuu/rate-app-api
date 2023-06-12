<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegidterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $userData = [
            "email" => "de@pple.com",
            "password" => "demo12345",
        ];

        $this->json('POST', 'api/Login', $userData, ['Accept' => 'application/json'])
            ->assertOk();
    }
}
