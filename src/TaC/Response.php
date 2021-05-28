<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC;

use Rbarden\Noaa\TaC\Enums\Format;
use Rbarden\Noaa\TaC\Enums\Product;

class Response
{
    private function __construct(
        private array $metadata = [],
        private array $data = [],
    ) {
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public static function forHumans(Data $data): self
    {
        return match ($data->getFormat()) {
            Format::JSON => static::fromJSON($data),
            Format::CSV => static::fromCSV(),
            Format::XML => static::fromXML(),
            default => throw new \Exception('Unknown format.'),
        };
    }

    private static function fromJSON(Data $data): self
    {
        $response = json_decode($data->getResponse()->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'] ?? 'Response Error');
        }

        if (in_array($data->getProduct(), [Product::DATUMS, Product::PREDICTIONS], true)) {
            $response['data'] = $response[$data->getProduct()];
        }

        $metadata = $response['metadata'] ?? [];

        $returnData = [];
        foreach ($response['data'] as $key => $datum) {
            foreach ($datum as $subkey => $value) {
                $returnData[$key][static::translateKey($subkey, $data->getProduct())] = $value;
            }
        }

        return new self($metadata, $returnData);
    }

    private static function fromCSV(): array
    {
        return [];
    }

    private static function fromXML(): array
    {
        return [];
    }

    private static function translateKey(string $key, string $product): string
    {
        return match ($key) {
            't' => 'time',
            'v' => 'value',
            's' => match ($product) {
                Product::WIND, Product::CURRENTS => 'speed',
                Product::SALINITY => 'salinity',
                default => 'sigma',
            },
            'f' => 'flags',
            'q' => 'quality',
            'd' => 'direction (degrees)',
            'dr' => 'direction (text)',
            'g' => match ($product) {
                Product::WIND => 'gust',
                Product::SALINITY => 'specific gravity',
                default => $key,
            },
            'n' => 'name',
            default => $key,
        };
    }
}
