<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UiController
{
    /**
     * @Route("/")
     */
    public function vehicles()
    {
        return new Response('');
    }
}