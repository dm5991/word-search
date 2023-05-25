<?php
// SearchProvider.php
namespace App\Interfaces;

interface SearchProviderInterface
{
  public function search(string $term): int;
}