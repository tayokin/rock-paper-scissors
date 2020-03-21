<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Game;

class GameService
{
    private const CHOICE_PAPER    = 'paper';
    private const CHOICE_ROCK     = 'rock';
    private const CHOICE_SCISSORS = 'scissors';

    private array $choiceMapping = [
        self::CHOICE_PAPER    => self::CHOICE_ROCK,
        self::CHOICE_ROCK     => self::CHOICE_SCISSORS,
        self::CHOICE_SCISSORS => self::CHOICE_PAPER,
    ];

    public function getMatchResult(): Game
    {
        $playerOneChoice = $this->getPlayerOneChoice();
        $playerTwoChoice = $this->getPlayerTwoChoice();

        return (new Game())
            ->setPlayerOneChoice($playerOneChoice)
            ->setPlayerTwoChoice($playerTwoChoice)
            ->setWinner($this->getWinner($playerOneChoice, $playerTwoChoice));
    }

    private function getPlayerOneChoice(): string
    {
        return self::CHOICE_PAPER;
    }

    private function getPlayerTwoChoice(): string
    {
        return array_rand($this->choiceMapping);
    }

    private function getWinner(string $playerOneChoice, string $playerTwoChoice): int
    {
        if ($playerOneChoice === $playerTwoChoice) {
            return Game::RESULT_DRAW;
        }

        return $this->choiceMapping[$playerOneChoice] === $playerTwoChoice
            ? Game::RESULT_PLAYER_ONE_WINS
            : Game::RESULT_PLAYER_TWO_WINS;
    }
}
