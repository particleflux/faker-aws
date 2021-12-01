<?php

namespace particleflux\FakerAWS\tests;

use Faker\Factory;
use particleflux\FakerAWS\Provider\Arn\Iam;
use particleflux\FakerAWS\Provider\Arn\Sns;
use particleflux\FakerAWS\Provider\Arn\Sqs;
use PHPUnit\Framework\TestCase;

class ArnTest extends TestCase
{
    /**
     * @dataProvider arnDataProvider
     */
    public function testArnGeneration(string $provider, string $method, array $params, string $expectedPattern): void
    {
        $faker = Factory::create();
        $faker->addProvider(new $provider($faker));

        $actual = $faker->$method(...$params);
        $this->assertIsString($actual);
        $this->assertMatchesRegularExpression($expectedPattern, $actual);
    }

    public function arnDataProvider(): array
    {
        $region = '(af|ap|ca|eu|me|sa|us)-(central|east|south|west|north|northeast|southeast)-\d';
        $uuidPattern = '[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}';

        return [
            'iam-user' => [Iam::class, 'awsArnIamUser', [], '/^arn:aws:iam::\d{12}:user\/[a-z0-9._-]+$/'],
            'iam-user-prefixed' => [Iam::class, 'awsArnIamUser', [true], '/^arn:aws:iam::\d{12}:user\/\w+\/[a-z0-9._-]+$/'],
            'iam-group' => [Iam::class, 'awsArnIamGroup', [], '/^arn:aws:iam::\d{12}:group\/[a-z0-9._-]+$/'],
            'iam-group-prefixed' => [Iam::class, 'awsArnIamGroup', [true], '/^arn:aws:iam::\d{12}:group\/\w+\/[a-z0-9._-]+$/'],
            'iam-role' => [Iam::class, 'awsArnIamRole', [], '/^arn:aws:iam::\d{12}:role\/[a-z0-9._-]+$/'],

            'sqs-queue' => [Sqs::class, 'awsArnSqsQueue', [], "/^arn:aws:sqs:$region:\\d{12}:[a-z0-9._-]+\$/"],

            'sns-topic' => [Sns::class, 'awsArnSnsTopic', [], "/^arn:aws:sns:$region:\\d{12}:[a-z0-9._-]+\$/"],
            'sns-topic-subscription' => [Sns::class, 'awsArnSnsTopicSubscription', [], "/^arn:aws:sns:$region:\\d{12}:[a-z0-9._-]+:$uuidPattern\$/"],
            'sns-platform-application' => [Sns::class, 'awsArnSnsPlatformApplication', [], "/^arn:aws:sns:$region:\\d{12}:app\/(ADM|Baidu|APNS|APNS_SANDBOX|GCM|MPNS|WNS)\/[a-z0-9._-]+\$/"],
            'sns-platform-endpoint' => [Sns::class, 'awsArnSnsPlatformEndpoint', [], "/^arn:aws:sns:$region:\\d{12}:endpoint\/(ADM|Baidu|APNS|APNS_SANDBOX|GCM|MPNS|WNS)\/[a-z0-9._-]+\/$uuidPattern\$/"],
        ];
    }
}
