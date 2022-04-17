<?php
declare(strict_types=1);

namespace App\Domains\Weather\Application;

use App\Domains\Weather\Application\Exception\WeatherApiException;
use App\Domains\Weather\ReadModel\WeatherDTO;
use App\Interfaces\ApiInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class WeatherApiService implements ApiInterface
{
    private const API_URL = 'https://api.weatherapi.com/v1/current.json?key=%s&q=%s';
    private const API_EXCEPTION_MESSAGE = 'Something gone wrong with fetch data from WeatherAPI';

    public function __construct(
        private Client $client,
        private string $apiKey
    ) {}


    /**
     * @throws WeatherApiException
     */
    public function fetchData(string $parameter): array
    {
        try {
           $response = $this->client->get(sprintf(self::API_URL, $this->apiKey, $parameter));

           $jsonResponse = json_decode($response->getBody()->getContents(), true);

           $weatherDTO = WeatherDTO::makeFromArray($jsonResponse);

        } catch (GuzzleException $e) {
            throw new WeatherApiException(self::API_EXCEPTION_MESSAGE, Response::HTTP_BAD_REQUEST);
            //todo: logger $e
        }
    }
}