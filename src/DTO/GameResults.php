<?php

declare(strict_types=1);

namespace App\DTO;

class GameResults
{
    /** @var Game[] */
    private array $games;

    private int $playerOneWinsCount;

    private int $playerTwoWinsCount;

    private int $drawCount;

    /** @return Game[] */
    public function getGames(): array
    {
        return $this->games;
    }

    /** @param Game[] $games */
    public function setGames(array $games): self
    {
        $this->games = $games;

        return $this;
    }

    public function getPlayerOneWinsCount(): int
    {
        return $this->playerOneWinsCount;
    }

    public function setPlayerOneWins(int $playerOneWinsCount): self
    {
        $this->playerOneWinsCount = $playerOneWinsCount;

        return $this;
    }

    public function getPlayerTwoWinsCount(): int
    {
        return $this->playerTwoWinsCount;
    }

    public function setPlayerTwoWinsCount(int $playerTwoWinsCount): self
    {
        $this->playerTwoWinsCount = $playerTwoWinsCount;

        return $this;
    }

    public function getDrawCount(): int
    {
        return $this->drawCount;
    }

    public function setDrawCount(int $drawCount): self
    {
        $this->drawCount = $drawCount;

        return $this;
    }
}
