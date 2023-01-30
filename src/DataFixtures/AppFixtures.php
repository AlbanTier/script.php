<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Performer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; ++$i)
        {
            $movie = new Movie();
            $movie->setTitle("Movie $i")
                ->setRating(random_int(0,50));
            $performer = new Performer();
            $performer->setFirstName("FirstName $i")
                ->setLastName("LastName $i");
            $movie->addPerformer($performer);
            $manager->persist($movie);
            $manager->persist($performer);
        }
        $manager->flush();
    }
}
