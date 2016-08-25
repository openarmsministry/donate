<?php namespace App\Sanitizers;

class AmountSanitizer
{
    protected $original;

    function __construct($value) {
        $this->original = $value;
    }

    public function sanitize() {
        $filtered = filter_var($this->original, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        return (float) $filtered;
    }
}