<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{

    /** @var string  */
    const GOOGLE_REVERSE_GEO_URL = 'https://maps.googleapis.com/maps/api/geocode/json?';


    /**
     * @param Request $request
     * @Route("/location/detect", name="location_detect")
     * @return JsonResponse
     * @throws GuzzleException
     *
     * Get a postcode from the user lat and long
     */
    public function index(Request $request)
    {
        $postcode   = null;
        $data       = json_decode($request->getContent());
        $apiKey     = $this->getParameter('app.google_geo');
        $latLong    = "{$data->lat},{$data->long}";
        $url        = self::GOOGLE_REVERSE_GEO_URL."latlng={$latLong}&key={$apiKey}";
        $client     = new Client();

        $response       = $client->get($url);
        $responseData   = json_decode($response->getBody()->getContents());

        if (property_exists($responseData, 'results') && count($responseData->results) > 0) {
            $postcode = $responseData->results[0]->address_components[7]->long_name;
        }

        return new JsonResponse(['postcode' => $postcode]);
    }
}
