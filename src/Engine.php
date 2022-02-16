<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use Brain\Games as Game;

/**
 * @param $startMsg
 * @param $questionArr массив формата [ ['вопрос','ответ']] пример [['1+1',2]]
 * @return int
 */
function game($startMsg, $questionArr)
{
    line($startMsg);
    foreach ($questionArr as [$question, $answer]) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ((string)$answer !== (string)$userAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            return 0;
        }
        line("Correct!");
    }
    return 1;
}


function gameStart($startMsg, $questionArr)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (game($startMsg, $questionArr)) {
        line("Congratulations, {$name}");
    } else {
        line("Let's try again, {$name}");
    }
}
