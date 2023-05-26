<?php
namespace App\SearchProvider;

class SearchResponse
{
  public function __construct(int $positiveCount, int $negativeCount)
  {
    $this->positiveCount = $positiveCount;
    $this->negativeCount = $negativeCount;
  }

  public int $positiveCount;
  public int $negativeCount;
}