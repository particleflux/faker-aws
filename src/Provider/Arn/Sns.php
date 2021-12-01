<?php

namespace particleflux\FakerAWS\Provider\Arn;

class Sns extends Arn
{
    protected const SERVICE = 'sns';

    /** @var string[] possible platforms for mobile push */
    protected static array $platforms = [
        'ADM', 'Baidu', 'APNS', 'APNS_SANDBOX', 'GCM', 'MPNS', 'WNS',
    ];

    /**
     * Generate a random AWS SNS topic ARN
     *
     * Example: 'arn:aws:sns:us-east-1:123456789012:topic_name'
     *
     * @return string
     */
    public function awsArnSnsTopic(): string
    {
        $region = $this->regionProvider->awsRegion();
        $topic  = $this->generator->word();
        return $this->formatArn($region, $topic);
    }

    /**
     * Generate a random AWS SNS topic subscription ARN
     *
     * Example: 'arn:aws:sns:us-east-1:123456789012:topic_name:b17a4cc7-99c2-45e6-93a2-2dabacf3fc5f'
     *
     * @return string
     */
    public function awsArnSnsTopicSubscription(): string
    {
        $region       = $this->regionProvider->awsRegion();
        $topic        = $this->generator->word();
        $subscription = $this->generator->uuid();
        return $this->formatArn($region, "$topic:$subscription");
    }

    /**
     * Generate a random AWS SNS platform application ARN
     *
     * Example: 'arn:aws:sns:us-east-1:123456789012:app/GCM/my-app'
     *
     * @return string
     */
    public function awsArnSnsPlatformApplication(): string
    {
        $region   = $this->regionProvider->awsRegion();
        $app      = $this->generator->word();
        $platform = static::randomElement(static::$platforms);

        return $this->formatArn($region, "app/$platform/$app");
    }

    /**
     * Generate a random AWS SNS platform application endpoint ARN
     *
     * Example: 'arn:aws:sns:us-east-1:123456789012:endpoint/GCM/my-app/b17a4cc7-99c2-45e6-93a2-2dabacf3fc5f'
     *
     * @return string
     */
    public function awsArnSnsPlatformEndpoint(): string
    {
        $region     = $this->regionProvider->awsRegion();
        $app        = $this->generator->word();
        $platform   = static::randomElement(static::$platforms);
        $endpointId = $this->generator->uuid();

        return $this->formatArn($region, "endpoint/$platform/$app/$endpointId");
    }
}
