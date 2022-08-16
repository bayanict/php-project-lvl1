<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\gcd;

function playGcd($name)
{
    $countRight = 0;
    while ($countRight < 3) {
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);
        $question = "{$operand1} {$operand2}";
        $expect = gcd($operand1, $operand2);

        line("Question: {$question}");
        $answer = (int) prompt("Your answer: ");
        $right = $expect === $answer ? true : false;
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

function startGcd()
{
    $man = greet("gcd");
    playGcd($man);
}
