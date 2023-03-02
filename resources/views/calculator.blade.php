<form action="{{ route('calculate') }}" method="POST">
    @csrf

    <div>
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" id="num1" value="{{ old('num1') }}" required>
    </div>

    <div>
        <label for="num2">{{ request('operation') == 'log' ? 'Base' : 'Number 2' }}</label>
        <input type="number" name="num2" id="num2" value="{{ old('num2') }}">
    </div>

    <div>
        <label for="operation">Operation:</label>
        <select name="operation" id="operation" required>
            <option value="">Select an operation</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="log">Logarithm</option>
            <option value="sin">Sine</option>
            <option value="cos">Cosine</option>
            <option value="tan">Tangent</option>
            <option value="exp">Exponential</option>
            <option value="pow">Power</option>
        </select>
    </div>

    <button type="submit">Calculate</button>
</form>
@if (isset($result))
        <p>The result is: {{ $result }}</p>
@endif

<script>
    const operationSelect = document.getElementById('operation');
    const num2Label = document.querySelector('label[for="num2"]');
    const num2Input = document.getElementById('num2');

    operationSelect.addEventListener('change', () => {
      const selectedOperation = operationSelect.value;

      if (selectedOperation === 'log') {
        num2Label.textContent = 'Base';
      } else {
        num2Label.textContent = 'Number 2';
      }

      if (selectedOperation === 'add' || selectedOperation === 'subtract' || selectedOperation === 'multiply' || selectedOperation === 'divide' || selectedOperation === 'log') {
        num2Input.required = true;

      } else if (selectedOperation === 'sin' || selectedOperation === 'cos' || selectedOperation === 'tan' || selectedOperation === 'exp') {
        num2Input.required = false;
        num2Input.style.display = 'none';
        num2Label.style.display = 'none';
      } else {
        num2Input.required = false;

      }
    });
  </script>






