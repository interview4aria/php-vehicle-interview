<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VechileFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vehicle = new Vehicle();
        $vehicle->setName('Enola Gay');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Spirit of St. Louis');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Batmobile');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Bullitt');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Dilbar');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Al Mirqab');
        $manager->persist($vehicle);

        $manager->flush();
    }
}
