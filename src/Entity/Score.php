<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $term = null;

    #[ORM\Column]
    private ?int $provider_id = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\Column]
    private ?int $total_count = null;

    #[ORM\Column]
    private ?int $positive_count = null;

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
        return $this->provider_id;
    }

    public function setProviderId(int $provider_id): self
    {
        $this->provider_id = $provider_id;

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
        return $this->total_count;
    }

    public function setTotalCount(int $total_count): self
    {
        $this->total_count = $total_count;

        return $this;
    }

    public function getPositiveCount(): ?int
    {
        return $this->positive_count;
    }

    public function setPositiveCount(int $positive_count): self
    {
        $this->positive_count = $positive_count;

        return $this;
    }
}