<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $generator = Factory::create("it_IT");
        for ($i=0; $i<30; $i++){
            $book = new Book(
                $generator->words(3, true),
                $generator->name(),
                $generator->numberBetween(50,3000)
            );
            $manager->persist($book);
        }

        $manager->flush();
    }
}
