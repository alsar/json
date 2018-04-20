<?php
declare(strict_types=1);

namespace Intriro\Json;

use JsonException;

class Json
{
    /**
     * @throws JsonException
     */
    public static function decode(string $json, int $depth = 512, int $options = 0): array
    {
        if (PHP_VERSION_ID < 70300) {
            return json_decode($json, true, $depth, JSON_THROW_ON_ERROR | $options);
        }

        return \json_decode($json, true, $depth, JSON_THROW_ON_ERROR | $options);
    }

    /**
     * @throws JsonException
     */
    public static function decodeToStdClass(string $json, int $depth = 512, int $options = 0): \stdClass
    {
        if (PHP_VERSION_ID < 70300) {
            return json_decode($json, false, $depth, JSON_THROW_ON_ERROR | $options);
        }

        return \json_decode($json, false, $depth, JSON_THROW_ON_ERROR | $options);
    }

    /**
     * @throws JsonException
     */
    public static function encode($value, int $depth = 512, int $options = 0): string
    {
        if (PHP_VERSION_ID < 70300) {
            return json_encode($value, JSON_THROW_ON_ERROR | $options, $depth);
        }

        return \json_encode($value, JSON_THROW_ON_ERROR | $options, $depth);
    }
}