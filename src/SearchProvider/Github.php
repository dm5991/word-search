<?php
// src/SearchProvider/GithubSearchProvider.php
namespace App\SearchProvider;

use App\Generic\BaseSearchProvider;

class GithubSearchProvider extends BaseSearchProvider
{
  public function search(string $term): SearchResponse
  {
    $action = 'search/issues?per_page=1&q=';
    $positiveUrl = $this->baseUrl . $action . $term . ' rocks';
    $negativeUrl = $this->baseUrl . $action . $term . ' sucks';
    $positiveResponse = $this->getRequest($positiveUrl);
    $negativeResponse = $this->getRequest($negativeUrl);

    $positiveContent = $positiveResponse->toArray();
    $negativeContent = $negativeResponse->toArray();

    return new SearchResponse($positiveContent['total_count'], $negativeContent['total_count']);
  }
}