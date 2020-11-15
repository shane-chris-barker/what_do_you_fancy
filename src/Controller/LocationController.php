<?php

namespace App\Controller;


use App\Service\GoogleGeoService;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class LocationController extends AbstractController
{




    /**
     * @param Request $request
     * @Route("/location/detect", name="location_detect")
     * @return JsonResponse
     * @throws \Exception
     * @throws GuzzleException
     *
     * Get a postcode from the user lat and long
     */
    public function index(Request $request, GoogleGeoService $googleGeoService)
    {
        $postcode   = null;
        $data       = json_decode($request->getContent());


        $postcode = $googleGeoService->reverseGeoLookup($data->long, $data->lat);

        if (false === is_null($postcode)) {
            // found ya
            return new JsonResponse(['success' => true, 'postcode' => $postcode]);

        }
        // no response means the user doesn't have a postcode - it can happen, they
        // may be on a boat in the middle of the sea!
        throw new \Exception('postcode lookup failed');

    }
}
