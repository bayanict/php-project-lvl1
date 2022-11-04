<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playGame;

function isPrime(int $num)
{
    if ($num == 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function preparePrimeData()
{
    $data = [];
    while (count($data) < 3) {
        $number = rand(1, 100);

        $question = $number;
        $expect = isPrime($number) ? "yes" : "no";

        if (array_key_exists($question, $data)) {
            continue;
        }

        $data[$question] = $expect;
    }
    return $data;
}

function startPrime()
{
    $man = greet("prime");
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    playGame(preparePrimeData(), $man);
}
