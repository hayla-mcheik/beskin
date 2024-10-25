<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class AfterOrEqualToday implements Rule
{
    public function passes($attribute, $value)
    {
        // Adjust the date format to match your input
        $selectedDate = Carbon::createFromFormat('m/d/Y', $value);

        // Check if the provided date is after or equal to today
        return $selectedDate->isToday() || $selectedDate->isFuture();
    }

    public function message()
    {
        return 'The :attribute must be a date after or equal to today.';
    }
}
