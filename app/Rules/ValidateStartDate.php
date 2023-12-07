<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateStartDate implements Rule
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function passes($attribute, $value)
    {
        return ($value >= $this->startDate && $value <= $this->endDate);
    }

    public function message()
    {
        return 'The :attribute must be between ' . $this->startDate . ' and ' . $this->endDate . '.';
    }
}
