<?php
//SearchProvider.php
namespace App\Generic;

use App\Interfaces\SearchProviderInterface;
use App\SearchProvider\SearchResponse;
use Symfony\Component\HttpClient\HttpClient;

abstract class BaseSearchProvider implements SearchProviderInterface
{
    protected $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getRequest(string $url): mixed
    {
        $httpClient = HttpClient::create();

        try {
            $response = $httpClient->request('GET', $url);

            return $response;
        } catch (\Exception $exception) {
            throw new \Exception('Failed external API call.');
        }
    }

    abstract public function search(string $term): SearchResponse;
}