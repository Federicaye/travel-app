<?php

class Validator
{
    public static function string($value, $min, $max)
    {
        $value = trim($value);
        return strlen(($value)) >= $min && strlen(($value)) <= $max;
    }

    public static function integer($value, $min, $max)
    {
        return $value >= $min && $value <= $max;
    }
}