<?php

namespace particleflux\FakerAWS\Provider\Arn;

use Faker\Provider\Base;

abstract class Arn extends Base
{
    protected const ARN_FORMAT = 'arn:aws:%s::%s:%s';
    protected const SERVICE    = 'unknown';

    protected function formatArn(string $path): string
    {
        $account = self::numerify('############');
        return sprintf(static::ARN_FORMAT, static::SERVICE, $account, $path);
    }
}
