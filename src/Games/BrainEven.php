<?php

namespace Brain\Games\Even;

use Brain\Games\Engine as Engine;

/**
 * @param $iter количество данных для игры
 * @return array
 */
function generateData($iter = 3)
{

    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $val = rand(1, 100);
        $question = $val;
        $answer = $val % 2 ? 'no' : 'yes';
        $data[] = [$question, $answer];
    }
    return $data;
}

/**
 * @return string Сообщение для старта игры
 */
function getStartMsg()
{
    return 'Answer "yes" if the number is even, otherwise answer "no"';
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
