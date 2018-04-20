<?php

namespace Intriro\Json {

    /**
     * @return string
     *
     * @throws \JsonException
     */
    function json_encode($value, $options = 0, $depth = 512)
    {
        $result = \json_encode($value, $options, $depth);

        if (PHP_VERSION_ID < 73000) {
            if(JSON_THROW_ON_ERROR & (1 << 22)) {
                $code = \json_last_error();

                if ($code !== \JSON_ERROR_NONE) {
                    throw new \JsonException(\json_last_error_msg(), $code);
                }
            }
        }

        return $result;
    }

    /**
     * @return mixed
     *
     * @throws \JsonException
     */
    function json_decode($json, $assoc = false, $depth = 512, $options = 0) {

        $result = \json_decode($json, $assoc, $depth, $options);

        if (PHP_VERSION_ID < 73000) {
            if (JSON_THROW_ON_ERROR & (1 << 22)) {

                $code = \json_last_error();

                if ($code !== \JSON_ERROR_NONE) {
                    throw new \JsonException(\json_last_error_msg(), $code);
                }
            }
        }

        return $result;
    }
}
