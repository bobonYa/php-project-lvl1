<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * @param string $startMsg
 *
 * массив формата [ ['вопрос','ответ']] пример [['1+1',2]]
 * @param array $questionArr
 *
 * @return boolean
 */
function game(string $startMsg, array $questionArr)
{
    line($startMsg);
    foreach ($questionArr as [$question, $answer]) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ((string)$answer !== $userAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            return false;
        }
        line("Correct!");
    }
    return true;
}

/**
 * @param string $startMsg
 * @param array $questionArr
 * @return void
 */
function gameStart(string $startMsg, array $questionArr)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (game($startMsg, $questionArr)) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
}
