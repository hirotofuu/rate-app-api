<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "de@pple.com",
            "password" => "demo12345",
        ];

        $this->json('POST', 'api/Register', $userData, ['Accept' => 'application/json'])
            ->assertOk();
    }
}
