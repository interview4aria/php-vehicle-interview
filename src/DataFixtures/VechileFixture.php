<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use App\Entity\Plane;
use App\Entity\Boat;
use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VechileFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vehicle = new Vehicle();
        $vehicle->setName('Enola Gay');
        $vehicle->setType('plane');
        $vehicle->setColor('silver');
        $vehicle->setPrice('1231881');
        $vehicle->setDescription('The Enola Gay is a Boeing B-29 Superfortress bomber, named after Enola Gay Tibbets, the mother of the pilot, Colonel Paul Tibbets. On 6 August 1945, piloted by Tibbets and Robert A. Lewis during the final stages of World War II, it became the first aircraft to drop an atomic bomb.');

        $plane = new Plane();
        $plane->setVehicle($vehicle);
        $plane->setNumEngines(4);
        $plane->setEngineType('propeller');
        $plane->setSeating(0);
        $plane->setCrew(12);
        $manager->persist($plane);

        $vehicle = new Vehicle();
        $vehicle->setName('Spirit of St. Louis');
        $vehicle->setType('plane');
        $vehicle->setColor('gray');
        $vehicle->setPrice('1383020');
        $vehicle->setDescription('Louis is the custom-built, single-engine, single-seat, high-wing monoplane that was flown by Charles Lindbergh on May 20–21, 1927, on the first solo nonstop transatlantic flight from Long Island, New York, to Paris, France, for which Lindbergh won the $25,000 Orteig Prize.');

        $plane = new Plane();
        $plane->setVehicle($vehicle);
        $plane->setNumEngines(1);
        $plane->setEngineType('propeller');
        $plane->setSeating(1);
        $plane->setCrew(0);
        $manager->persist($plane);

        $vehicle = new Vehicle();
        $vehicle->setName('Batmobile');
        $vehicle->setType('car');
        $vehicle->setColor('black');
        $vehicle->setPrice('620000');
        $vehicle->setDescription('The Batmobile is the fictional car driven by the superhero Batman. Housed in the Batcave, which it accesses through a hidden entrance, the Batmobile is both a heavily armored tactical assault vehicle and a personalized custom-built pursuit and capture vehicle that is used by Batman in his fight against crime.');

        $car = new Car();
        $car->setVehicle($vehicle);
        $car->setMotor('5.7-liter Chevy V8 engine');
        $car->setFuel('gasoline');
        $car->setPassengers(2);
        $manager->persist($car);

        $vehicle = new Vehicle();
        $vehicle->setName('Bullitt');
        $vehicle->setType('car');
        $vehicle->setColor('gray');
        $vehicle->setPrice('3700000');
        $vehicle->setDescription('The 1968 Ford Mustang GT driven by Steve McQueen in the 1968 film "Bullitt" just auctioned off for $3.74 million. It is now considered the most valuable Ford Mustang in the world, according to the auction house that sold the car, Mecum Auctions.');

        $car = new Car();
        $car->setVehicle($vehicle);
        $car->setMotor('Ford 390-cubic-inch V-8');
        $car->setFuel('gasoline');
        $car->setPassengers(4);
        $manager->persist($car);

        $vehicle = new Vehicle();
        $vehicle->setName('Dilbar');
        $vehicle->setType('boat');
        $vehicle->setColor('white');
        $vehicle->setPrice('1000000000');
        $vehicle->setDescription('Dilbar is a super-yacht launched on 14 November 2015 at the German Lürssen shipyard and delivered in 2016. It was built as Project Omar. The interior design of Dilbar was designed by Andrew Winch and the exterior by Espen Oeino. As of 2020, Dilbar is the sixth longest yacht in the world.');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Al Mirqab');
        $vehicle->setType('boat');
        $vehicle->setColor('blue');
        $vehicle->setPrice('250000000');
        $vehicle->setDescription('Al Mirqab is one of the largest motor yachts ever built. The yacht belongs to Qatar\'s former Prime Minister and Foreign Minister Hamad bin Jassim bin Jaber Al Thani. The yacht was built at Peters Schiffbau Wewelsfleth yard in Germany.');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setName('Air Force One');
        $vehicle->setType('plane');
        $vehicle->setColor('white');
        $vehicle->setPrice('3200000000');
        $vehicle->setDescription('Air Force One is the official air traffic control call sign for a United States Air Force aircraft carrying the president of the United States. In common parlance, the term is used to denote U.S. Air Force aircraft modified and used to transport the president.[1] The aircraft are prominent symbols of the American presidency and its power.');

        $plane = new Plane();
        $plane->setVehicle($vehicle);
        $plane->setNumEngines(4);
        $plane->setEngineType('jet');
        $plane->setSeating(76);
        $plane->setCrew(26);
        $manager->persist($plane);

        $manager->flush();
    }
}
