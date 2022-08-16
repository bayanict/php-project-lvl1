<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function playProgression($name)
{
    $countRight = 0;
    while ($countRight < 3) {
        $start = rand(1, 20);
        $del = rand(1, 15);
        $last = $start;
        $nums = [];
        for ($i = 0; $i < 10; $i++) {
            $nums[] = $last;
            $last += $del;
        }
        $index = rand(0, 9);
        $expect = (int) $nums[$index];
        $nums[$index] = "..";
        $question = implode(" ", $nums);

        line("Question: {$question}");
        $answer = (int) prompt("Your answer: ");
        $right = $expect === $answer;
        if ($right) {
            line("Correct!");
            $countRight += 1;
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
    playProgression($man);
}
