<?php
declare(strict_types=1);

namespace Intriro\Json;

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function test_decode()
    {
        $json = '{"a": 1, "b": 2, "c": 3}';

        $data = Json::decode($json);

        $this->assertEquals($data, ['a' => 1, 'b' => 2, 'c' => 3]);
    }

    public function test_decode_with_syntax_error()
    {
        $this->expectException(\JsonException::class);

        $json = '{"foo": bar, baz}';

        Json::decode($json);
    }

    public function test_encode()
    {
        $data = ['a' => 1, 'b' => 2, 'c' => 3];

        $json = Json::encode($data);

        $this->assertEquals($json, '{"a":1,"b":2,"c":3}');
    }
}