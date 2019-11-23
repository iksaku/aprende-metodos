<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AnswerRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(-?\d+\.?\d*,?)+$/', $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La respuesta debe ser introducida en formato numérico. Si se tratase de una matriz o raíces de polinomios, los valores deben encontrarse separados por una coma (,).';
    }
}
