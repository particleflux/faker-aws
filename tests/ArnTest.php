<?php

namespace particleflux\FakerAWS\tests;

use Faker\Factory;
use particleflux\FakerAWS\Provider\Arn\Iam;
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
        return [
            'iam-user' => [Iam::class, 'awsArnIamUser', [], '/^arn:aws:iam::\d{12}:user\/[a-z0-9._-]+$/'],
            'iam-user-prefixed' => [Iam::class, 'awsArnIamUser', [true], '/^arn:aws:iam::\d{12}:user\/\w+\/[a-z0-9._-]+$/'],
        ];
    }
}
