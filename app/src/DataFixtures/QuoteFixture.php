<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Quote;
use Faker\Factory;

class QuoteFixture extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 50; $i++) {
            $manager->persist($this->getQuote());
        }

        $manager->flush();
    }

    private function getQuote()
    {
        return new Quote(
            $this->faker->sentence(10),
            $this->faker->name(25),
            $this->faker->year()
        );
    }
}
