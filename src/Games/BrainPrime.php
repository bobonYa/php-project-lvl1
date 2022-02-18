<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine as Engine;

/**
 * Генерация списка простых
 * @return int[]
 */
function getPrime()
{
    $max = 100000;
    $primes = [2, 3, 5];

    for ($i = 7; $i < $max; $i += 2) {
        $sqrt_i = (int)sqrt($i);

        for ($j = 0; $primes[$j] <= $sqrt_i; $j++) {
            if ($i % $primes[$j] == 0) continue 2;
        }
        $primes[] = $i;
    }
    return $primes;
}


/**
 * @param $iter количество данных для игры
 * @return array
 */
function generateData($iter = 3)
{
    $arrPrime = getPrime();
    $data = [];
    for ($i = 0; $i < $iter; $i++) {
        $val = rand(1, 1000);
        $question = "{$val}";
        $answer = in_array($val, $arrPrime) ? 'yes' : 'no';
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
