<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function getExpected($array, $key, $value1, $value2)
{
    switch ($array[$key]) {
        case "+":
            return $value1 + $value2;
        case "-":
            return $value1 - $value2;
        case "*":
            return $value1 * $value2;
        default:
            throw new Error(`Unknown operator: {$array[$key]}!`);
    }
}

function playCalc(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 10);
        $operators = ["sum" => "+", "min" => "-", "mult" => "*"];
        $operator = array_rand($operators, 1);
        $question = "{$operand1} {$operators[$operator]} {$operand2}";

        $expect = getExpected($operators, $operator, $operand1, $operand2);

        line("Question: {$question}");
        $answer = (int) prompt("Your answer");
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

function startCalc()
{
    $man = greet("calc");
    playCalc($man);
}
