<?php

namespace particleflux\FakerAWS\Provider\Arn;

use Faker\Provider\Base;
use particleflux\FakerAWS\Provider\Account;

abstract class Arn extends Base
{
    protected const ARN_FORMAT = 'arn:aws:%s:%s:%s:%s';
    protected const SERVICE    = 'unknown';

    protected function formatArn(string $region, string $path): string
    {
        $accountProvider = new Account($this->generator);

        $account = $accountProvider->awsAccountId();
        return sprintf(static::ARN_FORMAT, static::SERVICE, $region, $account, $path);
    }
}
