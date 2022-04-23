<?php
declare(strict_types=1);

namespace App\Domains\Weather\Application\Command;

class SetWeatherData
{
    public function __construct(
        private string $parameter
    ) {}

    public function getParameter(): string
    {
        return $this->parameter;
    }
}