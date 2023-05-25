<?php

// src/Controller/ScoreController.php
namespace App\Controller;

use App\Entity\Score;
use App\Generic\BaseSearchProvider;
use App\Repository\ScoreRepository;
use App\SearchProvider\GithubSearchProvider;
use App\SearchProvider\SearchProviderEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
  /**
   * @Route("/api/v1/score/{providerId}/{term}/", methods={"GET"})
   */
  public function getScore(string $providerId, string $term, ScoreRepository $scoreRepository): JsonResponse
  {

    try {
      $provider = $this->getSearchProvider($providerId);
      $positiveSuffix = ' rocks';

      $score = $scoreRepository->findByTermAndProvider($term, $providerId);

      if ($score == null) {
        $totalCount = $provider->search($term);
        $totalCountPositive = $provider->search($term . $positiveSuffix);

        $result = ($totalCountPositive / $totalCount) * 10;

        $score = new Score();
        $score->setTerm($term);
        $score->setProviderId($providerId);
        $score->setScore($result);
        $score->setTotalCount($totalCount);
        $score->setPositiveCount($totalCountPositive);

        $scoreRepository->save($score, true);
      }
    } catch (\LogicException $exception) {
      return new JsonResponse(['error' => $exception->getMessage()], Response::HTTP_NOT_IMPLEMENTED);
    } catch (\Exception $exception) {
      return new JsonResponse(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return new JsonResponse([
      'term' => $score->getTerm(),
      'provider_id' => $score->getProviderId(),
      'score' => $score->getScore(),
      'total_count' => $score->getTotalCount(),
      'positive_count' => $score->getPositiveCount(),
    ]);
  }

  private function getSearchProvider(int $providerId): BaseSearchProvider
  {
    // Create the search provider based on the provider string
    switch ($providerId) {
      case SearchProviderEnum::GITHUB:
        return new GithubSearchProvider($_ENV['GITHUB_URL']);
      default:
        throw new \LogicException('Invalid search provider ID.');
    }
  }
}