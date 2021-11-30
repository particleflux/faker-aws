<?php

namespace particleflux\FakerAWS\Provider;

use Faker\Provider\Base;

class Account extends Base
{
    /**
     * Generate a random AWS account id
     *
     * @return string
     */
    public function awsAccountId(): string
    {
        return self::numerify('############');
    }
}
