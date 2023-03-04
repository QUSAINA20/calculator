<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'num1' => 'required|numeric',
            'num2' => 'required_if:operation,+,-,*,/,log|nullable|numeric',
            'operation' => 'required|in:+,-,*,/,log,sin,cos,tan,exp,pow'
        ];
    }
}
