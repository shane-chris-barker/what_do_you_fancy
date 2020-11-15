<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ResultsController extends AbstractController
{
    /**
     * @Route("/eat", name="eat")
     */
    public function indexAction(Request $request)
    {
        // get data and call API for results
        $data       = json_decode($request->getContent());

        // first, we need to convert the postcode / to a lat / long - if the user
        // selected the 'use my location' option, this will already exist in the $request data
        if (false === is_null($data->lat)) {
            // we have it
            $longitude = $data->long;
            $latitiude = $data->lat;
        } else {
            // we need to call the geo api and get it
        }
//
        // call the google api and get all results in a 5 mile radius

        return new JsonResponse(['data' => $data]);

    }
}
