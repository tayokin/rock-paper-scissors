<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Game;
use App\DTO\GameResults;
use App\Interfaces\GameResultsInterface;

class GameResultsService implements GameResultsInterface
{
    private GameService $gameService;
    private int $gameTries;

    private array $resultsCount = [
        Game::RESULT_PLAYER_ONE_WINS => 0,
        Game::RESULT_PLAYER_TWO_WINS => 0,
        Game::RESULT_DRAW            => 0,
    ];

    public function __construct(GameService $gameService, int $gameTries)
    {
        $this->gameService = $gameService;
        $this->gameTries   = $gameTries;
    }

    public function getResults(): GameResults
    {
        $games = [];

        for ($i=0; $i<$this->gameTries; ++$i) {
            $game = $this->gameService->getMatchResult();
            $this->increaseResultsCount($game->getWinner());
            $games[] = $game;
        }

        return (new GameResults())
            ->setGames($games)
            ->setPlayerOneWins($this->resultsCount[Game::RESULT_PLAYER_ONE_WINS])
            ->setPlayerTwoWinsCount($this->resultsCount[Game::RESULT_PLAYER_TWO_WINS])
            ->setDrawCount($this->resultsCount[Game::RESULT_DRAW]);
    }

    private function increaseResultsCount(int $winner): void
    {
        $this->resultsCount[$winner]++;
    }
}
