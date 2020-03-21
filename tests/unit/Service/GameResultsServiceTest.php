<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Game;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\GameResultsService
 *
 * @internal
 */
class GameResultsServiceTest extends TestCase
{
    /** @var GameService|MockObject */
    private MockObject $gameService;
    /** @var Game|MockObject */
    private MockObject $gameDto;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gameService = $this->createMock(GameService::class);
        $this->gameDto     = $this->createMock(Game::class);
    }

    public function testGetResults(): void
    {
        $gameTries          = 2;
        $gameResultsService = new GameResultsService($this->gameService, $gameTries);

        $this->gameService->expects(static::exactly($gameTries))
            ->method('getMatchResult')
            ->willReturn($this->gameDto);

        $results = $gameResultsService->getResults();

        static::assertIsArray($results->getGames());
    }
}
