<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet($game)
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
    }

    return $name;
}
