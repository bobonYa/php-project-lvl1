<?php

namespace Brain\Games\GCD;

use Brain\Games\Engine as Engine;

/**
 * @param $iter количество данных для игры
 * @return array
 */
function generateData($iter = 3)
{

    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $val1 = rand(1, 100);
        $val2 = rand(1, 100);
        $question = "{$val1} {$val2}";
        $answer = gmp_strval(gmp_gcd($val1,$val2));
        $data[] = [$question, $answer];
    }
    return $data;
}

/**
 * @return string Сообщение для старта игры
 */
function getStartMsg()
{
    return 'Find the greatest common divisor of given numbers.';
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