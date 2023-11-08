<?php

namespace App\Models\Traits;

trait HasAppendedValues
{
    public function getAppendedAttributes(){
        return $this->appends;
    }
}
