<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playGame;

function prepareProgressionData()
{
    $data = [];
    while (count($data) < 3) {
        $base = rand(1, 20);
        $delta = rand(1, 15);
        $progression = [$base];

        while (count($progression) < 10) {
            $progression[] = $progression[count($progression) - 1] + $delta;
        }

        $index = rand(0, 9);
        $expect = (string) $progression[$index];
        $progression[$index] = "..";
        $question = implode(" ", $progression);

        if (array_key_exists($question, $data)) {
            continue;
        }

        $data[$question] = $expect;
    }
    return $data;
}

function startProgression()
{
    $man = greet("progression");
    line("What number is missing in the progression?");
    playGame(prepareProgressionData(), $man);
}
