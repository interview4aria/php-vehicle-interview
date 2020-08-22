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
        $vehicle->setType('plane');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Spirit of St. Louis');
        $vehicle->setType('plane');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Batmobile');
        $vehicle->setType('car');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Bullitt');
        $vehicle->setType('car');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Dilbar');
        $vehicle->setType('boat');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Al Mirqab');
        $vehicle->setType('boat');
        $manager->persist($vehicle);

        $manager->flush();
    }
}
