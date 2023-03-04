<?php

namespace App\Calculator\Contracts;

interface CalculatorInterface
{
    public function add(float $a, float $b): float;

    public function subtract(float $a, float $b): float;

    public function multiply(float $a, float $b): float;

    public function divide(float $a, float $b): float;

    public function log(float $a, float $b): float;

    public function sin(float $a): float;

    public function cos(float $a): float;

    public function tan(float $a): float;

    public function pow(float $a, float $b): float;

    public function exp(float $a): float;
}
