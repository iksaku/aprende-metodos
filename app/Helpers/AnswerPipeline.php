<?php

namespace App\Helpers;

class AnswerPipeline
{
    /**
     * @param string $answer
     * @return array|float
     */
    public static function make(string $answer)
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
