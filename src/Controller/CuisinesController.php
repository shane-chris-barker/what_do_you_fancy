<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CuisinesController extends AbstractController
{
    /**
     * @Route("/api/cuisines", name="get_cuisines")
     */
    public function index()
    {
        $cuisines = [
            0 => ['name'    => 'Please Select'],
            1 => ['name'    => 'Indian'],
            2 => ['name'    => 'Chinese'],
            3 => ['name'    => 'American'],
            4 => ['name'    => 'Italian'],
            5 => ['name'    => 'Mexican'],
            6 => ['name'    => 'Thai']
        ];

        return new JsonResponse($cuisines);
    }
}
