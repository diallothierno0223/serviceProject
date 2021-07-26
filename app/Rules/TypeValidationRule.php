<?php

namespace App\Rules;

use App\Models\Profil;
use Illuminate\Contracts\Validation\Rule;

class TypeValidationRule implements Rule
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
        // dd(gettype($value));
        if(Profil::where('id', '=', $value)->count() > 0){
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
        return 'type de compte invalide';
    }
}
