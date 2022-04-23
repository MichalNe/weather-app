<?php
declare(strict_types=1);

namespace App\Domains\Weather\Application;

use App\Domains\Weather\Application\Command\SetWeatherData;
use App\Domains\Weather\Application\Exception\WeatherApiException;
use App\Domains\Weather\DomainModel\WeatherInformationFactory;
use App\Domains\Weather\DomainModel\WeatherRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class WeatherApiService
{
    private const API_URL = 'https://api.weatherapi.com/v1/current.json?key=%s&q=%s';
    private const API_EXCEPTION_MESSAGE = 'Something gone wrong with fetch data from WeatherAPI';

    public function __construct(
        private Client $client,
        private string $apiKey,
        private WeatherRepository $weatherRepository
    ) {}


    public function setWeather(SetWeatherData $command): Response
    {
        try {
            $data = $this->fetchData($command->getParameter());
        } catch (WeatherApiException $e) {
            return new Response(self::API_EXCEPTION_MESSAGE, Response::HTTP_BAD_REQUEST);
        }

        $weatherInformation = WeatherInformationFactory::create($data);

        $this->weatherRepository->setWeatherData($weatherInformation);

        return new Response('Weather data fetched', Response::HTTP_OK);
    }

    /**
     * @throws WeatherApiException
     */
    private function fetchData(string $parameter): array
    {
        try {
           $response = $this->client->get(sprintf(self::API_URL, $this->apiKey, $parameter));

           $jsonResponse = json_decode($response->getBody()->getContents(), true);

        } catch (GuzzleException $e) {
            throw new WeatherApiException(self::API_EXCEPTION_MESSAGE, Response::HTTP_BAD_REQUEST);
        }

        return $jsonResponse;
    }
}