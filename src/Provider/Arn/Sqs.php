<?php

namespace particleflux\FakerAWS\Provider\Arn;

class Sqs extends Arn
{
    protected const SERVICE = 'sqs';

    /**
     * Generate a random AWS SQS queue ARN
     *
     * Example: 'arn:aws:sqs:us-east-1:391393893958:my_queue'
     *
     * @return string
     */
    public function awsArnSqsQueue(): string
    {
        $region = $this->regionProvider->awsRegion();
        $queue  = $this->generator->word();
        return $this->formatArn($region, $queue);
    }
}
