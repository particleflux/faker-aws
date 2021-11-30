<?php

namespace particleflux\FakerAWS\Provider;

use Faker\Provider\Base;

class Region extends Base
{
    /** @var string[] */
    protected static array $northAmerica = [
        'Canada'              => 'ca-central-1',
        'North Virginia'      => 'us-east-1',
        'Ohio'                => 'us-east-2',
        'Northern California' => 'us-west-1',
        'Oregon'              => 'us-west-2',
    ];

    /** @var string[] */
    protected static array $southAmerica = [
        'São Paulo' => 'sa-east-1',
    ];

    /** @var string[] */
    protected static array $middleEast = [
        'Bahrain' => 'me-south-1',
    ];

    /** @var string[] */
    protected static array $africa = [
        'Cape Town' => 'af-south-1',
    ];

    /** @var string[] */
    protected static array $europe = [
        'Frankfurt' => 'eu-central-1',
        'Stockholm' => 'eu-north-1',
        'Milan'     => 'eu-south-1',
        'Ireland'   => 'eu-west-1',
        'London'    => 'eu-west-2',
        'Paris'     => 'eu-west-3',
    ];

    /** @var string[] */
    protected static array $asiaPacific = [
        'Hong Kong' => 'ap-east-1',
        'Tokyo'     => 'ap-northeast-1',
        'Seoul'     => 'ap-northeast-2',
        'Osaka'     => 'ap-northeast-3',
        'Singapore' => 'ap-southeast-1',
        'Mumbai'    => 'ap-south-1',
        'Sydney'    => 'ap-southeast-2',
    ];


    public function awsRegion(): string
    {
        return static::randomElement(
            array_merge(
                static::$northAmerica,
                static::$southAmerica,
                static::$middleEast,
                static::$africa,
                static::$europe,
                static::$asiaPacific
            )
        );
    }

    public function awsRegionName(): string
    {
        return static::randomElement(
            array_keys(
                array_merge(
                    static::$northAmerica,
                    static::$southAmerica,
                    static::$middleEast,
                    static::$africa,
                    static::$europe,
                    static::$asiaPacific
                )
            )
        );
    }

    public function awsRegionEurope(): string
    {
        return static::randomElement(static::$europe);
    }

    public function awsRegionNorthAmerica(): string
    {
        return static::randomElement(static::$northAmerica);
    }

    public function awsRegionSouthAmerica(): string
    {
        return static::randomElement(static::$southAmerica);
    }

    public function awsRegionAsiaPacific(): string
    {
        return static::randomElement(static::$asiaPacific);
    }
}
