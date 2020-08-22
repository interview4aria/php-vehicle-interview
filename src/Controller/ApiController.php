<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $data = $serializer->serialize($vehicles, 'json');

        return new Response($data);
    }
}