<?php
// src/SearchProvider/GithubSearchProvider.php
namespace App\SearchProvider;

use App\Generic\BaseSearchProvider;

class GithubSearchProvider extends BaseSearchProvider
{
  public function search(string $term): int
  {
    $action = 'search/issues?q=';
    $url = $this->baseUrl . $action . $term;
    $response = $this->getRequest($url);

    $totalCount = $response['total_count'];

    return $totalCount;
  }
}