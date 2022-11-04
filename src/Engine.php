<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet(string $game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function playGame(array $preparedData, string $name)
{
    foreach ($preparedData as $question => $expect) {
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if ($expect === $answer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$expect}'.");
            line("Let's try again, {$name}!");
            return null;
        }
    }
    line("Congratulations, {$name}!");
}
