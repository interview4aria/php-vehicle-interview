<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        $vehicles = $qb->getQuery()->getArrayResult();
            //->findAll()->getArrayResult();

        return new JsonResponse($vehicles);
    }
}