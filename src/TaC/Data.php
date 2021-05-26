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

/**
 *  The CO-OPS API for data retrieval can be used to retrieve observations and predictions from CO-OPS stations.
 *
 * @link https://api.tidesandcurrents.noaa.gov/api/prod/
 */
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

    /**
     * Execute the query and return the response
     *
     * This does save the response for use later if needed.
     */
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

    /**
     * Returns the array used for the query parameters in the request, including nulls
     */
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

    public function setQueries(array $queries): self
    {
        foreach ($queries as $key => $value) {
            $this->{$key}($value);
        }

        return $this;
    }

    /**
     * Returns the saved response generated from execute
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * To set the station id
     *
     * A 7 character station ID, or a currents station ID
     */
    public function station(string $stationID): self
    {
        $this->station = $stationID;

        return $this;
    }

    /**
     * To set the date parameter
     *
     * This sets the begin and end dates to null.
     *
     * @see Date for input
     */
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

    /**
     * To set the begin_date and end_date parameters
     *
     * This sets the date parameter to null.
     */
    public function rangeFromDates(DateTimeInterface $start, DateTimeInterface $end): self
    {
        $this->date = null;

        $this->beginDate = $start;
        $this->endDate = $end;

        return $this;
    }

    /**
     * To set the product parameter
     *
     * @see Product for input
     */
    public function product(string $product): self
    {
        if (Product::has($product)) {
            $this->product = $product;

            return $this;
        }

        throw new Exception('Incompatible product string given');
    }

    /**
     * To set the datum parameter
     *
     * @see Datum for input
     */
    public function datum(string $datum): self
    {
        if (Datum::has($datum)) {
            $this->datum = $datum;

            return $this;
        }

        throw new Exception('Incompatible datum string given');
    }

    /**
     * To set the vel_type parameter
     *
     * @see VelocityType for input
     */
    public function vel_type(string $velocity): self
    {
        if (VelocityType::has($velocity)) {
            $this->velocity = $velocity;

            return $this;
        }

        throw new Exception('Incompatible velocity string given');
    }

    /**
     * To set the units parameter
     *
     * @see Units for input
     */
    public function units(string $units): self
    {
        if (Units::has($units)) {
            $this->units = $units;

            return $this;
        }

        throw new Exception('Incompatible units string given');
    }

    /**
     * To set the time_zone parameter
     *
     * @see Timezone for input
     */
    public function time_zone(string $timezone): self
    {
        if (Timezone::has($timezone)) {
            $this->timezone = $timezone;

            return $this;
        }

        throw new Exception('Incompatible timezone string given');
    }

    /**
     * To set the format parameter
     *
     * @see Format for input
     */
    public function format(string $format): self
    {
        if (Format::has($format)) {
            $this->format = $format;

            return $this;
        }

        throw new Exception('Incompatible format string given');
    }

    /**
     * To set the interval parameter
     *
     * @see Interval for input
     */
    public function interval(string $interval): self
    {
        if (Interval::has($interval)) {
            $this->interval = $interval;

            return $this;
        }

        throw new Exception('Incompatible interval string given');
    }

    /**
     * To set the bin number
     *
     * The bin number for the specified currents station
     * Note: If a bin is not specified for a PORTS station, the data is returned using a predefined real-time bin.
     */
    public function bin(int $bin): self
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * To set the name of the application
     *
     * External users, please provide the name of your company or your name.
     * Internal CO-OPS users, please include the name of the application.
     * This parameter is used for helping to fix any possible usage issues.
     */
    public function application(string $application): self
    {
        $this->application = $application;

        return $this;
    }
}
