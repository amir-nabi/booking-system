<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
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
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second );
        $firstEarlyTime = Carbon::createFromTimeString('9:00:00');
        $firstLateTime = Carbon::createFromTimeString('13:00:00');
        $secondEarlyTime = Carbon::createFromTimeString('15:30:00');
        $secondLateTime = Carbon::createFromTimeString('21:00:00');
        if ($pickupTime->between($firstEarlyTime, $firstLateTime, true) || $pickupTime->between($secondEarlyTime, $secondLateTime, true))
        {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose time between 9am to 1pm or 3:30pm to 9pm.';
    }
}
