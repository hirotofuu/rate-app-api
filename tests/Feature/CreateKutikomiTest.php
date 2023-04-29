<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateKutikomiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $userData = [
            "attend" => "月一ぐらいである",
            "text" => "バブルの教養学",
            "test" => "4択の選択問題が10個と記述式が一つ。教科書は持ち込みかだが点数の評価は厳しいため難しいと評価",
            "task" => "一回だけありその分テストの点数に加算（１３点満点中4点ぐらい）",
            "comment" => "yyyyyyyyyyyyyyyyyyyyy",
            "evaluate" => "難",
            "rate" => 2,
            "jugyo_id" => 1,
        ];

        $this->json('POST', 'api/createKutikomi', $userData, ['Accept' => 'application/json'])
            ->assertOk();
    }
}
