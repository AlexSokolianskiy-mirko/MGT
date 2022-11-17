<?php

namespace App\Rules\Geo;

use Illuminate\Contracts\Validation\InvokableRule;

class Longitude implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!preg_match('/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]{1,15})$/', $value)) {
            $fail('ivalid longitude');
        }
    }
}
