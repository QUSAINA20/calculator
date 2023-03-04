<?php

namespace App\Calculator;

use App\Calculator\Contracts\CalculatorInterface;

class Calculator implements CalculatorInterface
{

    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    public function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('Division by zero.');
        }

        return $a / $b;
    }

    public function log(float $a, float $b): float
    {
        if ($a == 0) {
            throw new \InvalidArgumentException('First number can\' be under zero');
        }
        return log($a, $b);
    }

    public function sin(float $a): float
    {
        return sin($a);
    }

    public function cos(float $a): float
    {
        return cos($a);
    }

    public function tan(float $a): float
    {
        return tan($a);
    }

    public function pow(float $a, float $b): float
    {
        return pow($a, $b);
    }

    public function exp(float $a): float
    {
        return exp($a);
    }
}
