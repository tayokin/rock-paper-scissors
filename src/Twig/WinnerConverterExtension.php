<?php


namespace App\Twig;

use App\DTO\Game;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WinnerConverterExtension extends AbstractExtension
{
    private array $winnerNames = [
        Game::RESULT_PLAYER_ONE_WINS => 'player A',
        Game::RESULT_PLAYER_TWO_WINS => 'player B',
        Game::RESULT_DRAW            => 'draw',
    ];

    public function getFunctions(): array
    {
        return [
            new TwigFunction('winnerName', [$this, 'getWinnerName']),
        ];
    }

    public function getWinnerName(int $winner): string
    {
        return $this->winnerNames[$winner];
    }
}