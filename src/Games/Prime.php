<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\isPrime;

function playPrime($name)
{
    $countRight = 0;
    while ($countRight < 3) {
        $number = rand(1, 100);
        $question = $number;

        line("Question: {$question}");
        $answer = prompt("Your answer: ");
        $right = isPrime($number);
        if ($right && $answer === "yes") {
            line("Correct!");
            $countRight += 1;
        } elseif (!$right && $answer === "no") {
            line("Correct!");
            $countRight += 1;
        } else {
            if ($right) {
                line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
            } else {
                line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
            }
            line("Let's try again, {$name}!");
            return false;
        }
    }
    line("Congratulations, {$name}!");
    return true;
}

function startPrime()
{
    $man = greet("prime");
    playPrime($man);
}

