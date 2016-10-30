<?php

namespace App\Podty;

use GuzzleHttp\Client;

class ApiClient
{
    /**
     * ApiService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_BASE_URL'),
            'auth' => [
                env('API_AUTH_USER'),
                env('API_AUTH_PASS')
            ]
        ]);
    }

    /**
     * @param $resource
     * @return array
     */
    public function get($resource)
    {
        try {
            $response = ($this->client->get($resource)->getBody()->getContents());
        } catch (\Exception $exception) {
            return [];
        }

        $response = json_decode($response, true);

        return $response;
    }
}