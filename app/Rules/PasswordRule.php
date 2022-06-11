<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
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
        if (
            preg_match("/[a-z]/", $value) == true &&
            preg_match("/[A-Z]/", $value) == true &&
            preg_match("/[0-9]/", $value) == true &&
            preg_match("/[\\!\\@\\#\\$\\%\\^\\&\\*]/", $value) == true
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain upper case, lower case, number and special
        characters';
    }
}
