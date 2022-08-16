<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function playEven(string $name)
{
    $countRight = 0;
    while ($countRight < 3) {
        $number = rand(1, 100);
        line("Question: {$number}");
        $answer = prompt("Your answer: ");
        $mod = $number % 2 === 0 ? true : false;
        if ($mod && $answer === "yes") {
            line("Correct!");
            $countRight += 1;
        } elseif (!$mod && $answer === "no") {
            line("Correct!");
            $countRight += 1;
        } else {
            if ($mod) {
                line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
                line("Let's try again, {$name}!");
                return null;
            } else {
                line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
                line("Let's try again, {$name}!");
                return null;
            }
        }
    }
    line("Congratulations, {$name}!");
}

function startEven()
{
    $man = greet("even");
    playEven($man);
}
