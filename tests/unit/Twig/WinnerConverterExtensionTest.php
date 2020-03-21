<?php

declare(strict_types=1);

namespace App\Twig;

use App\DTO\Game;
use PHPUnit\Framework\TestCase;
use Twig\TwigFunction;

/**
 * @covers \App\Twig\WinnerConverterExtension
 *
 * @internal
 */
class WinnerConverterExtensionTest extends TestCase
{
    public function testGetFunctions(): void
    {
        $winnerConverterExtension = new WinnerConverterExtension();
        static::assertIsArray($winnerConverterExtension->getFunctions());
        static::assertInstanceOf(
            TwigFunction::class,
            $winnerConverterExtension->getFunctions()[0]
        );
    }

    public function testGetWinnerName(): void
    {
        $winner     = Game::RESULT_DRAW;
        $winnerName = 'draw';

        $winnerConverterExtension = new WinnerConverterExtension();
        static::assertIsString($winnerConverterExtension->getWinnerName($winner));
        static::assertSame(
            $winnerName,
            $winnerConverterExtension->getWinnerName($winner)
        );
    }
}
