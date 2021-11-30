# faker-aws

AWS data provider for [fakerphp/faker]

## Installation

```shell
composer require particleflux/faker-aws
```

## Usage

```php
$faker = Factory::create();
$faker->addProvider(new \particleflux\FakerAWS\Region($this->faker));
$faker->addProvider(new \particleflux\FakerAWS\Account($this->faker));
$faker->addProvider(new \particleflux\FakerAWS\Arn\Iam($this->faker));


// generate an AWS account id
echo $faker->awsAccountId();    // 445191444111

// generate a random AWS region
echo $faker->awsRegion();       // eu-central-1

// generate a random AWS region in europe only
echo $faker->awsRegionEurope(); // eu-west-1

// generate a random AWS region in north america
echo $faker->awsRegionNorthAmerica();   // us-east-1

// generate an IAM user ARN
echo $faker->awsArnIamUser();       // arn:aws:iam::391393893958:user/flarson
echo $faker->awsArnIamUser(true);   // arn:aws:iam::654242095245:user/rerum/frami.verdie
```

[fakerphp/faker]: https://github.com/FakerPHP/Faker
