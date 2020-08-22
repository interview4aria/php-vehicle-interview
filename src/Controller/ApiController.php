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

        $data = $this->serializeData($vehicles);

        return new Response($data);
    }

    /**
     * @Route("/api/plane/{id}", methods={"GET", "HEAD"})
     */
    public function getPlane($id)
    {
        return new Response('');
    }

    private function serializeData($data)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->serialize($data, 'json');
    }
}