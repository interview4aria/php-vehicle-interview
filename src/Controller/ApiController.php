<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    /**
     * @Route("/vehicles")
     */
    public function vehicles()
    {
        return new Response('');
    }
}