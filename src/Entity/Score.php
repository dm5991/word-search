<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    public function __construct(
        string $term, int $providerId,
        int $score, int $totalCount, int $positiveCount
    ) {
        $this->term = $term;
        $this->providerId = $providerId;
        $this->score = $score;
        $this->totalCount = $totalCount;
        $this->positiveCount = $positiveCount;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $term = null;

    #[ORM\Column]
    private ?int $providerId = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\Column]
    private ?int $totalCount = null;

    #[ORM\Column]
    private ?int $positiveCount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getProviderId(): ?int
    {
        return $this->providerId;
    }

    public function setProviderId(int $providerId): self
    {
        $this->providerId = $providerId;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    public function getPositiveCount(): ?int
    {
        return $this->positiveCount;
    }

    public function setPositiveCount(int $positiveCount): self
    {
        $this->positiveCount = $positiveCount;

        return $this;
    }
}