<?php

namespace App\Helpers;

use App\Exercise;

class AnswerPipeline
{
    public static function isCorrect(Exercise $exercise, string $answer)
    {
        return self::make($exercise->answer) === self::make($answer);
    }

    /**
     * @param string $answer
     * @return array|float
     */
    protected static function make(string $answer)
    {
        if (strpos($answer, ',') === false) {
            // The answer is not in 'matrix' format
            return self::numberPipe((float) $answer);
        } else {
            // The answer is provided in 'matrix' format
            return self::matrixPipe($answer);
        }
    }

    /**
     * @param float $number
     * @return float
     */
    protected static function numberPipe(float $number)
    {
        return round($number, 4);
    }

    /**
     * @param string $matrixString
     * @return array
     */
    protected static function matrixPipe(string $matrixString)
    {
        $data = explode(',', $matrixString);

        return array_map(function (string $value) {
            return self::numberPipe((float) $value);
        }, $data);
    }
}
