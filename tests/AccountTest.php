<?php

namespace particleflux\FakerAWS\tests;

use Faker\Factory;
use particleflux\FakerAWS\Provider\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /**
     * @var \Faker\Generator|Account
     */
    private $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        $this->faker->addProvider(new Account($this->faker));
    }

    public function testAwsAccountId(): void
    {
        $result = $this->faker->awsAccountId();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression('/^\d{12}$/', $result);
    }
}
