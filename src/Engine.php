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
