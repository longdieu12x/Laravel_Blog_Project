<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VanHoaQuote implements Rule
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
        //
        $toxics = ["địt","mẹ","dit","djt","me","fuck","noob","bitch"];
        foreach ($toxics as $toxic){
            if (strpos($value,$toxic)){
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Bạn nên nói văn hóa lên đi ạ!.';
    }
}
