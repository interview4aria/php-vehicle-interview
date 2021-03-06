<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\Plane;
use App\Entity\Car;
use App\Entity\Boat;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/vehicles")
     */
    public function getVehicles()
    {
        $qb = $this->getDoctrine()
            ->getRepository(Vehicle::class)
            ->createQueryBuilder('v')
            ->orderBy('v.name');

        $vehicles = $qb->getQuery()->getResult();

        $data = $this->serializeData($vehicles);

        return new Response($data);
    }

    /**
     * @Route("/api/plane/{id}", methods={"GET", "HEAD"})
     */
    public function getPlane($id)
    {
        $plane = $this->getDoctrine()
            ->getRepository(Plane::class)
            ->findOneByVehicle($id);

        if ($plane === null) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse([
            'numEngines' => $plane->getNumEngines(),
            'engineType' => $plane->getEngineType(),
            'seating' => $plane->getSeating(),
            'crew' => $plane->getCrew()
        ]);
    }

    /**
     * @Route("/api/car/{id}", methods={"GET", "HEAD"})
     */
    public function getCar($id)
    {
        $car = $this->getDoctrine()
            ->getRepository(Car::class)
            ->findOneByVehicle($id);

        if ($car === null) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse([
            'motor' => $car->getMotor(),
            'fuel' => $car->getFuel(),
            'passengers' => $car->getPassengers()
        ]);
    }

    /**
     * @Route("/api/boat/{id}", methods={"GET", "HEAD"})
     */
    public function getBoat($id)
    {
        $boat = $this->getDoctrine()
            ->getRepository(Boat::class)
            ->findOneByVehicle($id);

        if ($boat === null) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse([
            'num_engines' => $boat->getNumEngines(),
            'propulsion' => $boat->getPropulsion(),
            'passengers' => $boat->getPassengers(),
            'crew' => $boat->getCrew()
        ]);
    }


    /**
     * This turns an object into json, it should not be altered and most likely
     * will not impact anything you need to do.
     */
    private function serializeData($data)
    {
        //$normalizer = ;
        //$normalizer->setIgnoredAttributes(['__initializer__','__cloner__','__isInitialized__']);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->serialize(
            $data,
            'json',
            [AbstractNormalizer::IGNORED_ATTRIBUTES => [
                '__initializer__',
                '__cloner__',
                '__isInitialized__'
            ]]
        );
    }
}