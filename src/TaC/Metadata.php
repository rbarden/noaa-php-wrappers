<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC;

use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * The CO-OPS Metadata API (MDAPI) can be used to retrieve information about CO-OPS' stations.
 *
 * A request can be made to return information about a specific station, or information about multiple stations can be returned.
 * @link https://api.tidesandcurrents.noaa.gov/mdapi/prod/
 */
class Metadata
{
    public function __construct(
        private string $extension = 'json',
        private string $baseUri = 'https://api.tidesandcurrents.noaa.gov/mdapi/prod/webapi/',
    )
    {
        if (! in_array($this->extension, ['json', 'xml'])) {
            throw new Exception('Must use json or xml extension');
        }
    }

    public function execute(string $uri, array $queries = []): ResponseInterface
    {
        $client = new Client(
            [
                'base_uri' => $this->baseUri,
            ]
        );

        return $client->request(
            'GET',
            "{$uri}.{$this->extension}",
            [
                'query' => $queries,
            ]
        );
    }

    public function station(string $id, string $resource = null): ResponseInterface
    {
        $uri = "stations/{$id}";
        if ($resource) {
            $uri .= "/{$resource}";
        }

        return $this->execute($uri);
    }

    public function stationsList(string $type = null): ResponseInterface
    {
        $uri = "stations";

        $queries = array_filter([
            'type' => $type,
        ]);

        return $this->execute($uri, $queries);
    }

    public function portsList(): ResponseInterface
    {
        $uri = "ports";

        return $this->execute($uri);
    }

    public function portsStation(string $ports = null): ResponseInterface
    {
        $uri = "portsstation";

        $queries = array_filter([
            'ports' => $ports,
        ]);

        return $this->execute($uri, $queries);
    }

    public function portsPlots(string $id = null): ResponseInterface
    {
        $uri = "portsplots";
        if ($id) {
            $uri .= "/{$id}";
        }

        return $this->execute($uri);
    }

    public function coopMode(): ResponseInterface
    {
        $uri = "mode";

        return $this->execute($uri);
    }
}
