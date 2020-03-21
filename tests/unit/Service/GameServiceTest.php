<?php

declare(strict_types=1);

namespace App\Service;

use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\GameService
 *
 * @internal
 */
class GameServiceTest extends TestCase
{
    private const CHOICE_PAPER    = 'paper';
    private const CHOICE_ROCK     = 'rock';
    private const CHOICE_SCISSORS = 'scissors';

    private GameService $gameService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gameService = new GameService();
    }

    public function testGetMatchResult(): void
    {
        $result = $this->gameService->getMatchResult();
        static::assertSame(self::CHOICE_PAPER, $result->getPlayerOneChoice());
        static::assertContains($result->getPlayerTwoChoice(), [self::CHOICE_PAPER, self::CHOICE_ROCK, self::CHOICE_SCISSORS]);
        static::assertContains($result->getWinner(), [1, 2, 3]);
    }

    public function testGetWinner(): void
    {
        $paperRock   = $this->gameService->getWinner(self::CHOICE_PAPER, self::CHOICE_ROCK);
        $scissorRock = $this->gameService->getWinner(self::CHOICE_SCISSORS, self::CHOICE_ROCK);
        $rockRock    = $this->gameService->getWinner(self::CHOICE_ROCK, self::CHOICE_ROCK);
        static::assertSame(1, $paperRock);
        static::assertSame(2, $scissorRock);
        static::assertSame(3, $rockRock);
    }
}
