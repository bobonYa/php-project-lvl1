<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

/**
 * генерация прогрессии
 * @param int $size
 * @param int $step
 * @return array
 */
function generateProgression(int $size = 10, int $step = 2)
{
    $array = [];
    $val = rand(-10, 10);
    for ($i = 0; $i < $size; $i++) {
        $array[] = $val;
        $val += $step;
    }
    return $array;
}

/**
 * количество данных для игры
 * @param int $iter
 * @return array
 */
function generateData(int $iter = 3)
{
    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $size = rand(5, 10);
        $step = rand(2, 5);
        $array = generateProgression($size, $step);
        $rand_key = array_rand($array, 1);
        $answer = $array[$rand_key];
        $array[$rand_key] = '..';
        $question = implode(' ', $array);
        $data[] = [$question, $answer];
    }
    return $data;
}

/**
 * @return string Сообщение для старта игры
 */
function getStartMsg()
{
    return 'What number is missing in the progression?';
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
