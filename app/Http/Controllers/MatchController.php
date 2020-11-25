<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class MatchController extends Controller
{
    /**
     * Get the live match information
     *
     * @return array
     */
    public function liveMatch()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://rest.entitysport.com/v2/matches/?status=3&token=437214169d9be2a73e91d22f76f68b52');
            $live_matches = json_decode((string) $response->getBody(), true);
        } catch (ClientException $e) {
            throw new Exception('Something went wrong');
        }
        
        return $live_matches['response']['items'];
    }

    /**
     * Get upcomming match information
     *
     * @return array
     */
    public function upcommingMatch()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://rest.entitysport.com/v2/matches/?status=1&token=437214169d9be2a73e91d22f76f68b52&per_page=30');
            $upcomming_matches = json_decode((string) $response->getBody(), true);
        } catch (ClientException $e) {
            throw new Exception('Something went wrong');
        }

        return $upcomming_matches['response']['items'];
    }
}
