<?php

namespace App\Http;

use GuzzleHttp\Client as Guzzle;
use App\Exceptions\GenericException;
use App\Http\ClientInterface;

class ClientGuzzle implements ClientInterface
{
    private $guzzle;

    private function getGuzzle()
    {
        if (!$this->guzzle) {
            $configuration = $this->getConfiguration();
            $this->guzzle = new Guzzle([
                'base_uri' => $configuration['url'],
                'auth' => [$configuration['user'], $configuration['password']]
            ]);
        }

        return $this->guzzle;
    }

    public function getConfiguration()
    {
        $env = env();

        if (array_key_exists('thejournal', $env)) {
            return $env['thejournal'];
        }

        throw new GenericException("API configuration not found");
    }

    public function getUri($uri)
    {
        $configuration = $this->getConfiguration();
        return "{$configuration['uri']}{$uri}";
    }

    public function call($method, $resource, array $params = [])
    {
        try {
            $response = $this->getGuzzle()->request($method, $this->getUri($resource));
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } catch (\Exception $e) {
            // Log the exception
            return [];
        }
    }

    public function get($resource, array $params = [])
    {
        return $this->call('GET', $resource, $params);
    }
}
