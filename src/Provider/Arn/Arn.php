<?php

namespace particleflux\FakerAWS\Provider\Arn;

use Faker\Generator;
use Faker\Provider\Base;
use particleflux\FakerAWS\Provider\Account;
use particleflux\FakerAWS\Provider\Region;

abstract class Arn extends Base
{
    protected const ARN_FORMAT = 'arn:aws:%s:%s:%s:%s';
    protected const SERVICE    = 'unknown';

    protected Region $regionProvider;

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);

        $this->regionProvider = new Region($generator);
    }


    protected function formatArn(string $region, string $path): string
    {
        $accountProvider = new Account($this->generator);

        $account = $accountProvider->awsAccountId();
        return sprintf(static::ARN_FORMAT, static::SERVICE, $region, $account, $path);
    }
}
