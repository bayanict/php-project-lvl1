<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet(string $game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    switch ($game) {
        case "even":
            line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
            break;
        case "calc":
            line("What is the result of the expression?");
            break;
        case "gcd":
            line("Find the greatest common divisor of given numbers.");
            break;
        case "progression":
            line("What number is missing in the progression?");
            break;
        case "prime":
            line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
            break;
        default:
            throw new \Exception(`Unknown game: {$game}!`);
    }

    return $name;
}
