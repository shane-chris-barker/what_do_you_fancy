<?php

namespace App\Service;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GoogleGeoService
{

    /** @var string  */
    const GOOGLE_REVERSE_GEO_URL = 'https://maps.googleapis.com/maps/api/geocode/json?';

    /** @var Client */
    private $client;

    /** @var string $apiKey */
    private $apiKey;

    /**
     * GoogleGeoService constructor.
     * @param Client $client
     * @param string $apiKey
     */
    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }


    /**
     * @param string $long
     * @param string $lat
     * @throws GuzzleException
     * @return null|string
     * Do a reverse lookup
     */
    public function reverseGeoLookup(string $long, string $lat)
    {
        $latLong    = "{$lat},{$long}";
        $url        = self::GOOGLE_REVERSE_GEO_URL."latlng={$latLong}&key={$this->apiKey}";

        $response       = $this->client->get($url);
        $responseData   = json_decode($response->getBody()->getContents());

        if (property_exists($responseData, 'results')
            && count($responseData->results) > 0
            && array_key_exists(7, $responseData->results)
        ) {
            return $postcode = $responseData->results[0]->address_components[7]->long_name;
        }

        return null;
    }

    /**
     * @param string $postcode
     * Do a lookup
     */
    public function geoLookup(string $postcode)
    {

    }
}
