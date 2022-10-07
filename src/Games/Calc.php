<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greet;
use function BrainGames\Engine\playEngine;

function getExpected(array $array, string $key, int $value1, int $value2)
{
    switch ($array[$key]) {
        case "+":
            return $value1 + $value2;
        case "-":
            return $value1 - $value2;
        case "*":
            return $value1 * $value2;
        default:
            throw new \Exception('Unknown operator: {$array[$key]}!');
    }
}

function prepareCalcData()
{
    $data = [];
    $operators = ["sum" => "+", "min" => "-", "mult" => "*"];

    while (count($data) < 3) {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 10);
        $operator = array_rand($operators);

        $question = "{$operand1} {$operators[$operator]} {$operand2}";
        $expect = (string) getExpected($operators, $operator, $operand1, $operand2);

        if (array_key_exists($question, $data)) {
            continue;
        }
        
        $data[$question] = $expect;
    }
    return $data;
}

function startCalc()
{
    $man = greet("calc");
    line("What is the result of the expression?");
    playEngine(prepareCalcData(), $man);
}
