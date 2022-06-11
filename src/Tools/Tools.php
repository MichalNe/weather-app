<?php

namespace App\Tools;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Tools
{
    private array $encoder;
    private array $normalizers;
    private Serializer $serializer;

    public function __construct()
    {
        $this->encoder = [new XmlEncoder(), new JsonEncoder()];
        $this->normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($this->normalizers, $this->encoder);
    }

    public static function serialize(mixed $data, string $format = 'json'): string
    {
        return (new Tools)->getSerializer()->serialize($data, $format);
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}