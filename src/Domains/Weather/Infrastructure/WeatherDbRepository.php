<?php
declare(strict_types=1);

namespace App\Domains\Weather\Infrastructure;

use App\Domains\Weather\DomainModel\WeatherEntityFactory;
use App\Domains\Weather\DomainModel\WeatherInformation;
use App\Domains\Weather\DomainModel\WeatherRepository;
use App\Domains\Weather\ReadModel\WeatherDTO;
use App\Entity\Weather;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class WeatherDbRepository implements WeatherRepository
{


    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function getWeatherData(): WeatherDTO
    {
        $query = $this->entityManager->createQuery(
            'SELECT *
             FROM weather'
        );

        $result = $query->getResult();

        dd($result);
    }

    public function setWeatherData(WeatherInformation $weatherInformation): void
    {
        $weatherEntity = WeatherEntityFactory::create($weatherInformation);

        $this->entityManager->persist($weatherEntity);

        $this->entityManager->flush();
    }
}