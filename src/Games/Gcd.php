<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playGame;

function gcd(int $first, int $second)
{
    if ($second == 0) {
        return $first;
    }
    return gcd($second, $first % $second);
}

function prepareGcdData()
{
    $data = [];
    while (count($data) < 3) {
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);

        $question = "{$operand1} {$operand2}";
        $rightAnswer = (string) gcd($operand1, $operand2);

        if (array_key_exists($question, $data)) {
            continue;
        }

        $data[$question] = $rightAnswer;
    }
    return $data;
}

function startGcd()
{
    $man = greet("gcd");
    line("Find the greatest common divisor of given numbers.");
    playGame(prepareGcdData(), $man);
}
