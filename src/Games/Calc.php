<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;

function playCalc(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 10);
        $operators = ["sum" => "+", "min" => "-", "mult" => "*"];
        $operator = array_rand($operators, 1);
        $question = "{$operand1} {$operators[$operator]} {$operand2}";
        $expect = 0;
        switch ($operators[$operator]) {
            case "+":
                $expect = $operand1 + $operand2;
                break;
            case "-":
                $expect = $operand1 - $operand2;
                break;
            case "*":
                $expect = $operand1 * $operand2;
                break;
        }

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
