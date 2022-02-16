<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine as Engine;

/**
 * @param $iter количество данных для игры
 * @return array
 */
function generateData($iter = 3)
{

    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $val = rand(1, 1000);
        $question = "{$val}";
        $answer = gmp_prob_prime($question) ? 'yes' : 'no';
        $data[] = [$question, $answer];
    }
    return $data;
}

/**
 * @return string Сообщение для старта игры
 */
function getStartMsg()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

/**
 * Запуск игры
 * @return void
 */
function start()
{

    $msg = getStartMsg();
    $data = generateData();
    Engine\gameStart($msg, $data);
}