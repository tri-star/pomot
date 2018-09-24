<?php

namespace Tests\Unit\Domains\Log;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Pomot\Domains\Log\Log;
use Pomot\Domains\Exceptions\DomainException;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @dataProvider getDataFortestRequired
     */
    public function testRequired($key, $value, $expectedException)
    {
        $log = factory(Log::class)->make();

        try {
            $log->$key = $value;
        } catch(\Exception $e) {
            $this->assertTrue($e instanceof $expectedException);
            return;
        } catch(\TypeError $e) {
            $this->assertTrue($e instanceof $expectedException);
            return;
        }
        $this->fail();
    }

    public function getDataForTestRequired()
    {
        return [
            'title:空白' => ['key' => 'title', 'value' => '', 'expectedException' => DomainException::class ],
            'title:null' => ['key' => 'title', 'value' => null, 'expectedException' => \TypeError::class],
            'description:空白' => ['key' => 'description', 'value' => '', 'expectedException' => DomainException::class],
            'description:null' => ['key' => 'description', 'value' => null, 'expectedException' => \TypeError::class],
        ];
    }

    public function testUserCanNotChangeManually()
    {
        $log = factory(Log::class)->make();

        $original_user_id = $log->userId;

        $newUserId = 100;
        $log->userId = $newUserId;

        $this->assertNotEwuals($log->userId, $newUserId, 'ユーザーIDを直接変更できないこと');
    }
}
