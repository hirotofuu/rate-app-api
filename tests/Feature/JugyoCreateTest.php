<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JugyoCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $userData = [
            "class_name" => "英語セミナー",
            "teacher_name" => "やまもとひろと",
            "faculty" => "経済学部",
            "campus" => "三田",
            "field" => "基礎教養科目",
            "url" => "https://gslbs.keio.jp/syllabus/detail?ttblyr=2023&entno=45746&lang=jp",
            "content" => "とてもいい授業でした",
        ];

        $this->json('POST', 'api/createJugyo', $userData, ['Accept' => 'application/json'])
            ->assertOk();
    }
}
