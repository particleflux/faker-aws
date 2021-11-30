<?php

namespace particleflux\FakerAWS\Provider\Arn;

use Faker\Provider\Base;

class Iam extends Arn
{
    protected const SERVICE = 'iam';

    /**
     * Generate a random AWS IAM user ARN
     *
     * Example: 'arn:aws:iam::391393893958:user/flarson'
     *
     * @param bool $withPrefix Whether to include a path-prefix
     * @return string
     */
    public function awsArnIamUser(bool $withPrefix = false): string
    {
        $user = $this->generator->userName();
        $prefix = '';
        if ($withPrefix) {
            $prefix = $this->generator->word() . '/';
        }

        return $this->formatArn("user/{$prefix}{$user}");
    }
}
