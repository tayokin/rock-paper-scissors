<?php

declare(strict_types=1);

namespace App\DTO;

class Game
{
    public const RESULT_PLAYER_ONE_WINS = 1;
    public const RESULT_PLAYER_TWO_WINS = 2;
    public const RESULT_DRAW            = 3;

    private string $playerOneChoice;
    private string $playerTwoChoice;
    private int $winner;

    public function getPlayerOneChoice(): string
    {
        return $this->playerOneChoice;
    }

    public function setPlayerOneChoice(string $playerOneChoice): self
    {
        $this->playerOneChoice = $playerOneChoice;

        return $this;
    }

    public function getPlayerTwoChoice(): string
    {
        return $this->playerTwoChoice;
    }

    public function setPlayerTwoChoice(string $playerTwoChoice): self
    {
        $this->playerTwoChoice = $playerTwoChoice;

        return $this;
    }

    public function getWinner(): int
    {
        return $this->winner;
    }

    public function setWinner(int $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
