<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use Illuminate\Http\Request;
use Exception;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(CalculatorRequest $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operation = $request->input('operation');

        $calculator = new Calculator();
        $result = $calculator->calculate($num1, $num2, $operation);

        return view('calculator', ['result' => $result]);
    }
}

class Calculator
{
    public function calculate($num1, $num2, $operation)
    {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                if ($num2 == 0) {
                    return 'Cannot divide by zero';
                }
                return $num1 / $num2;
            case 'log':
                if ($num1 < 0) {
                    return 'First number can\'be under 0';
                }
                return log($num1, $num2);
            case 'sin':
                return sin($num1);
            case 'cos':
                return cos($num1);
            case 'tan':
                return tan($num1);
            case 'exp':
                return exp($num1);
            case 'pow':
                return pow($num1, $num2);
            default:
                return 'Invalid operation';
        }
    }
}
