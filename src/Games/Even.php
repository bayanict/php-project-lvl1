<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function playEven(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        line("Question: {$number}");
        $answer = prompt("Your answer");
        $mod = $number % 2 === 0 ? "yes" : "no";
        if ($mod === $answer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$mod}'.");
            line("Let's try again, {$name}!");
            return null;
        }
    }
    line("Congratulations, {$name}!");
}

function startEven()
{
    $man = greet("even");
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    playEven($man);
}
