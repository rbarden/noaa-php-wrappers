<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC;

use DateTimeInterface;
use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Rbarden\Noaa\TaC\Enums\Date;
use Rbarden\Noaa\TaC\Enums\Datum;
use Rbarden\Noaa\TaC\Enums\Format;
use Rbarden\Noaa\TaC\Enums\Interval;
use Rbarden\Noaa\TaC\Enums\Product;
use Rbarden\Noaa\TaC\Enums\Timezone;
use Rbarden\Noaa\TaC\Enums\Units;
use Rbarden\Noaa\TaC\Enums\VelocityType;

class Data
{
    private ResponseInterface $response;

    private string $station;

    private ?DateTimeInterface $beginDate = null;
    private ?DateTimeInterface $endDate = null;
    private ?string $date = null;

    private string $product;

    private string $datum;

    private ?string $velocity = null;

    private string $units;

    private string $timezone;

    private string $format;

    private ?string $interval = null;

    private ?int $bin = null;

    private string $application;

    public function __construct(
        private string $baseUri = 'https://api.tidesandcurrents.noaa.gov/api/prod/datagetter',
    ) {
    }

    public function execute(): ResponseInterface
    {
        $client = new Client(
            [
                'base_uri' => $this->baseUri,
            ]
        );

        $this->response = $client->request(
            'GET',
            '',
            [
                'query' => $this->getQueries(),
            ]
        );

        return $this->response;
    }

    public function getQueries(): array
    {
        return [
            'station' => $this->station,
            'date' => $this->date,
            'begin_date' => $this->beginDate?->format('Ymd H:i'),
            'end_date' => $this->endDate?->format('Ymd H:i'),
            'product' => $this->product,
            'datum' => $this->datum,
            'vel_type' => $this->velocity,
            'units' => $this->units,
            'time_zone' => $this->timezone,
            'format' => $this->format,
            'interval' => $this->interval,
            'bin' => $this->bin,
            'application' => $this->application,
        ];
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function station(string $stationID): self
    {
        $this->station = $stationID;

        return $this;
    }

    public function date(string $date): self
    {
        if (Date::has($date)) {
            $this->beginDate = null;
            $this->endDate = null;

            $this->date = $date;

            return $this;
        }

        throw new Exception('Incompatible date string given');
    }

    public function rangeFromDates(DateTimeInterface $start, DateTimeInterface $end): self
    {
        $this->date = null;

        $this->beginDate = $start;
        $this->endDate = $end;

        return $this;
    }

    public function product(string $product): self
    {
        if (Product::has($product)) {
            $this->product = $product;

            return $this;
        }

        throw new Exception('Incompatible product string given');
    }

    public function datum(string $datum): self
    {
        if (Datum::has($datum)) {
            $this->datum = $datum;

            return $this;
        }

        throw new Exception('Incompatible datum string given');
    }

    public function velocityType(string $velocity): self
    {
        if (VelocityType::has($velocity)) {
            $this->velocity = $velocity;

            return $this;
        }

        throw new Exception('Incompatible velocity string given');
    }

    public function units(string $units): self
    {
        if (Units::has($units)) {
            $this->units = $units;

            return $this;
        }

        throw new Exception('Incompatible units string given');
    }

    public function timezone(string $timezone): self
    {
        if (Timezone::has($timezone)) {
            $this->timezone = $timezone;

            return $this;
        }

        throw new Exception('Incompatible timezone string given');
    }

    public function format(string $format): self
    {
        if (Format::has($format)) {
            $this->format = $format;

            return $this;
        }

        throw new Exception('Incompatible format string given');
    }

    public function interval(string $interval): self
    {
        if (Interval::has($interval)) {
            $this->interval = $interval;

            return $this;
        }

        throw new Exception('Incompatible interval string given');
    }

    public function bin(int $bin): self
    {
        $this->bin = $bin;

        return $this;
    }

    public function application(string $application): self
    {
        $this->application = $application;

        return $this;
    }
}
