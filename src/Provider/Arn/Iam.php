<?php

namespace particleflux\FakerAWS\Provider\Arn;

/**
 * IAM related ARNs
 *
 * https://docs.aws.amazon.com/IAM/latest/UserGuide/reference_identifiers.html
 */
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

        return $this->formatArn('', "user/{$prefix}{$user}");
    }

    /**
     * Generate a random AWS IAM group ARN
     *
     * Example: 'arn:aws:iam::391393893958:group/flarson'
     *
     * @param bool $withPrefix Whether to include a path-prefix
     * @return string
     */
    public function awsArnIamGroup(bool $withPrefix = false): string
    {
        $group = $this->generator->userName();
        $prefix = '';
        if ($withPrefix) {
            $prefix = $this->generator->word() . '/';
        }

        return $this->formatArn('', "group/{$prefix}{$group}");
    }

    /**
     * Generate a random AWS IAM role ARN
     *
     * Example: 'arn:aws:iam::391393893958:role/flarson'
     *
     * @return string
     */
    public function awsArnIamRole(): string
    {
        $role = $this->generator->word();
        return $this->formatArn('', "role/$role");
    }
}
