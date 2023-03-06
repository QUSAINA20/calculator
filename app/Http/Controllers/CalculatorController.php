<?php

namespace App\Http\Controllers;

use App\Calculator\Contracts\CalculatorInterface;
use App\Http\Requests\CalculatorRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use InvalidArgumentException;

class CalculatorController extends Controller
{
    protected $calculator;
    protected $operations = [
        '+' => 'add',
        '-' => 'subtract',
        '*' => 'multiply',
        '/' => 'divide',
        'log' => 'log',
        'sin' => 'sin',
        'cos' => 'cos',
        'tan' => 'tan',
        'pow' => 'pow',
        'exp' => 'exp',
    ];

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }
    public function index()
    {
        return view('calculator');
    }

    public function calculate(CalculatorRequest $request)

    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operation = $request->input('operation');

        $result = $this->performCalculation($num1, $num2, $operation);

        return view('calculator', compact('result'));
    }

    private function performCalculation(float $num1,  $num2, string $operation): ?float
    {
        $calculator = $this->calculator;
        $operations = [
            '+' => fn ($num1, $num2) => $calculator->add($num1, $num2),
            '-' => fn ($num1, $num2) => $calculator->subtract($num1, $num2),
            '*' => fn ($num1, $num2) => $calculator->multiply($num1, $num2),
            '/' => fn ($num1, $num2) => $calculator->divide($num1, $num2),
            'log' => fn ($num1, $num2) => $calculator->log($num1, $num2),
            'sin' => fn ($num1) => $calculator->sin($num1),
            'cos' => fn ($num1) => $calculator->cos($num1),
            'tan' => fn ($num1) => $calculator->tan($num1),
            'pow' => fn ($num1, $num2) => $calculator->pow($num1, $num2),
            'exp' => fn ($num1) => $calculator->exp($num1),
        ];

        return $operations[$operation]($num1, $num2) ?? null;
    }
}
