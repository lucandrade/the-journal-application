<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Http\ClientInterface;
use App\Exceptions\GenericException;

class RepositoryHttp implements RepositoryInterface
{
    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    private function validateArticle(array $article)
    {
        if (!(array_key_exists('title', $article) && !empty($article['title']))) {
            return false;
        }

        if (!(array_key_exists('excerpt', $article) && !empty($article['excerpt']))) {
            return false;
        }

        if (!(array_key_exists('images', $article) && is_array($article['images']) && !empty($article['images']))) {
            return array_key_exists('thumbnail', $article['images']) && !empty($article['images']['thumbnail']);
        }

        return true;
    }

    private function handleResponse(array $response)
    {
        if (array_key_exists('response', $response) && !empty($response)) {
            if (array_key_exists('articles', $response['response']) && is_array($response['response']['articles'])) {
                return array_filter($response['response']['articles'], [$this, 'validateArticle']);
                return $response['response']['articles'];
            }
        }

        throw new GenericException("The Journal API has retourned with invalid format");
    }

    public function get($resource)
    {
        try {
            $response = $this->httpClient->get($resource);
            return $this->handleResponse($response);
        } catch (\Exception $e) {
            //Log Exception;
        }

        return [];
    }
}
