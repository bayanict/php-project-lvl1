<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playEngine;

function prepareEvenData()
{
    $data = [];
    while (count($data) < 3) {
        $number = rand(1, 100);

        $question = $number;
        $expect = $number % 2 === 0 ? "yes" : "no";

        if (array_key_exists($question, $data)) {
            continue;
        }

        $data[$question] = $expect;
    }
    return $data;
}

function startEven()
{
    $man = greet("even");
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    playEngine(prepareEvenData(), $man);
}
