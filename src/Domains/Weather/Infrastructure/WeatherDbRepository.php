<?php
declare(strict_types=1);

namespace App\Domains\Weather\Infrastructure;

use App\Domains\Weather\DomainModel\WeatherDTOFactory;
use App\Domains\Weather\DomainModel\WeatherEntityFactory;
use App\Domains\Weather\DomainModel\WeatherInformation;
use App\Domains\Weather\DomainModel\WeatherRepository;
use App\Domains\Weather\ReadModel\Query\GetWeatherData;
use App\Domains\Weather\ReadModel\WeatherDTO;
use App\Entity\Weather;
use Doctrine\ORM\EntityManagerInterface;

class WeatherDbRepository implements WeatherRepository
{
    private const LIMIT = 1;
    private const ORDER_BY_KEY = 'DESC';

    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function getWeatherData(GetWeatherData $query): WeatherDTO
    {
        $sql = $this->entityManager->getRepository(Weather::class);

        $result = $sql->findBy(
            ['name' => $query->getParameter()],
            ['id' => self::ORDER_BY_KEY],
            self::LIMIT
        );

        return WeatherDTOFactory::create($result[0]->toArray());
    }

    public function setWeatherData(WeatherInformation $weatherInformation): void
    {
        $weatherEntity = WeatherEntityFactory::create($weatherInformation);

        $this->entityManager->persist($weatherEntity);

        $this->entityManager->flush();
    }
}