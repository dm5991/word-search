<?php
// SearchProvider.php
namespace App\Interfaces;

use App\SearchProvider\SearchResponse;

interface SearchProviderInterface
{
  public function search(string $term): SearchResponse;
}