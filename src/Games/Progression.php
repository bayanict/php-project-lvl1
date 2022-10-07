<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function playProgression(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $base = rand(1, 20);
        $delta = rand(1, 15);
        $nums = [];
        for ($k = 0; $k < 10; $k++) {
            $nums[] = $base;
            $base += $delta;
        }
        $index = rand(0, 9);
        $expect = (string) $nums[$index];
        $nums[$index] = "..";
        $question = implode(" ", $nums);
        line("Question: {$question}");
        $answer = prompt("Your answer: ");
        $right = $expect === $answer;
        if ($right) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$expect}'.");
            line("Let's try again, {$name}!");
            return false;
        }
    }
    line("Congratulations, {$name}!");
    return true;
}

function startProgression()
{
    $man = greet("progression");
    line("What number is missing in the progression?");
    playProgression($man);
}
