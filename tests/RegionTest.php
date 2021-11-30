<?php

namespace particleflux\FakerAWS\tests;

use Faker\Factory;
use particleflux\FakerAWS\Provider\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    private const PATTERN = '/^(af|ap|ca|eu|me|sa|us)-(central|east|south|west|north|northeast|southeast)-\d$/';

    /**
     * @var \Faker\Generator|Region
     */
    private $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        $this->faker->addProvider(new Region($this->faker));
    }

    public function testAwsRegion(): void
    {
        $result = $this->faker->awsRegion();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression(self::PATTERN, $result);
    }

    public function testAwsRegionName(): void
    {
        $result = $this->faker->awsRegionName();

        $this->assertIsString($result);
        $this->assertDoesNotMatchRegularExpression(self::PATTERN, $result);
    }

    public function testAwsRegionEurope(): void
    {
        $result = $this->faker->awsRegionEurope();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression(self::PATTERN, $result);
        $this->assertStringStartsWith('eu-', $result);
    }

    public function testAwsRegionNorthAmerica(): void
    {
        $result = $this->faker->awsRegionNorthAmerica();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression(self::PATTERN, $result);
        $this->assertMatchesRegularExpression('/^(ca|us)-/', $result);
    }

    public function testAwsRegionSouthAmerica(): void
    {
        $result = $this->faker->awsRegionSouthAmerica();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression(self::PATTERN, $result);
        $this->assertStringStartsWith('sa-', $result);
    }

    public function testAwsRegionAsiaPacific(): void
    {
        $result = $this->faker->awsRegionAsiaPacific();

        $this->assertIsString($result);
        $this->assertMatchesRegularExpression(self::PATTERN, $result);
        $this->assertStringStartsWith('ap-', $result);
    }
}
