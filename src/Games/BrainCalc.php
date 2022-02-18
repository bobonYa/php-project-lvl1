<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine as Engine;

/**
 * количество данных для игры
 * @param int $iter
 * @return array
 */
function generateData(int $iter = 3)
{
    $operationsArr = ['+', '-', '*'];
    $answer = '';
    $question = '';
    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $rand_key = array_rand($operationsArr, 1);
        $operation = $operationsArr[$rand_key];
        $val1 = rand(-10, 10);
        $val2 = rand(0, 20);
        switch ($operation) {
            case '+':
                $answer = $val1 + $val2;
                $question = "{$val1} + {$val2}";
                break;
            case '-':
                $answer = $val1 - $val2;
                $question = "{$val1} - {$val2}";
                break;
            case '*':
                $answer = $val1 * $val2;
                $question = "{$val1} * {$val2}";
                break;
        }
        $data[] = [$question, $answer];
    }
    return $data;
}

/**
 * @return string Сообщение для старта игры
 */
function getStartMsg()
{
    return 'What is the result of the expression?';
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
