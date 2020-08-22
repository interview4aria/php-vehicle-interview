<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController
{
    /**
     * @Route("/api/vehicles")
     */
    public function get()
    {
        return new JsonResponse([]);
    }
}