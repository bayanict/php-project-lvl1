<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

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

function playPrime(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        $question = $number;

        line("Question: {$question}");
        $answer = prompt("Your answer: ");
        $right = isPrime($number);
        if ($right && $answer === "yes") {
            line("Correct!");
        } elseif (!$right && $answer === "no") {
            line("Correct!");
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
