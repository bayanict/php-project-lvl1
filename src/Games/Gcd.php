<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playEngine;

function gcd(int $first, int $second)
{
    if ($second == 0) {
        return $first;
    }
    return gcd($second, $first % $second);
}

function prepareGcdData()
{
    $data = [];
    while (count($data) < 3) {
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);

        $question = "{$operand1} {$operand2}";
        $expect = (string) gcd($operand1, $operand2);

        if (array_key_exists($question, $data)) {
            continue;
        }

        $data[$question] = $expect;
    }
    return $data;
}

function playGcd(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);
        $question = "{$operand1} {$operand2}";
        $expect = (string) gcd($operand1, $operand2);

        line("Question: {$question}");
        $answer = prompt("Your answer: ");
        $right = $expect === $answer ? true : false;
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

function startGcd()
{
    $man = greet("gcd");
    line("Find the greatest common divisor of given numbers.");
    playEngine(prepareGcdData(), $man);
}
