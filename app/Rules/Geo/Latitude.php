<?php

namespace App\Rules\Geo;

use Illuminate\Contracts\Validation\InvokableRule;

class Latitude implements InvokableRule
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
        if (!preg_match('/^-?([0-8]?[0-9]|90)(\.[0-9]{1,15})$/', $value)) {
            $fail('ivalid latitude');
        }
    }
}
