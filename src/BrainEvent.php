<?php

namespace Brain\Games\Event;

use function cli\line;
use function cli\prompt;


//line('Welcome to the Brain Game!');
//$name = prompt('May I have your name?');
//line("Hello, %s!", $name);
//line('Answer "yes" if the number is even, otherwise answer "no".');
//$num = rand(1, 100);
//$answer = prompt("Question: {$num}");
//while (($answer === 'yes' && $num % 2 === 0) || (($answer === 'yes' && $num % 2 === 0))) {
//    line('Answer "yes" if the number is even, otherwise answer "no".');
//    $num = rand(1, 100);
//    $answer = prompt("Question: {$num}");
//}


function gameCheck($answer, $number)
{
    if (($answer === 'yes' && $number % 2 === 0) || (($answer === 'no' && $number % 2 !== 0)))
        return 1;
    return 0;
}

function game()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = rand(1, 100);
        line("Question: {$num}");
        $answer = prompt("Your answer: ");
        if (!gameCheck($answer, $num)) {
            if ($answer === 'yes') {
                $trueAnswer = "no";
            } else {
                $trueAnswer = "yes";
            }
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$trueAnswer}'.");
            return 0;
        }
        line("Correct!");
    }
    return 1;
}


function gameStart()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (game()) {
        line("Congratulations, {$name}");
    } else {
        line("Let's try again, {$name}");
    }

}