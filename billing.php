<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Billing System</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #45a049;
        }
        .calculator {
            background: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .calculator input[type="button"] {
            width: 50px;
            height: 50px;
            margin: 5px;
            font-size: 20px;
            border-radius: 5px;
            border: none;
            background: #555;
            color: white;
            cursor: pointer;
        }
        .calculator input[type="button"]:hover {
            background: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Restaurant Billing System</h1>
        <form method="post" action="">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" placeholder="Firstname" required>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" placeholder="Surname" required>

            <label for="telephone">Telephone:</label>
            <input type="text" name="telephone" placeholder="Telephone" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" placeholder="Address"></textarea>

            <h2>Order Details</h2>
            <label for="bmeal">Burger Meal (£1.95):</label>
            <input type="number" name="bmeal" min="0" value="0">

            <label for="lfries">Large Fries (£1.10):</label>
            <input type="number" name="lfries" min="0" value="0">

            <label for="fmeal">Filet o Meal (£2.30):</label>
            <input type="number" name="fmeal" min="0" value="0">

            <label for="cmeal">Chicken Meal (£2.45):</label>
            <input type="number" name="cmeal" min="0" value="0">

            <label for="mcheese">Cheese Meal (£0.87):</label>
            <input type="number" name="mcheese" min="0" value="0">

            <label for="drinks">Drinks (£1.20):</label>
            <input type="number" name="drinks" min="0" value="0">

            <input type="submit" name="calculate" value="Calculate Total" class="btn">
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $bmeal = $_POST['bmeal'] * 1.95;
            $lfries = $_POST['lfries'] * 1.10;
            $fmeal = $_POST['fmeal'] * 2.30;
            $cmeal = $_POST['cmeal'] * 2.45;
            $mcheese = $_POST['mcheese'] * 0.87;
            $drinks = $_POST['drinks'] * 1.20;

            $subtotal = $bmeal + $lfries + $fmeal + $cmeal + $mcheese + $drinks;
            $tax = $subtotal * 0.12;
            $total = $subtotal + $tax;

            echo "<h3>Subtotal: £" . number_format($subtotal, 2) . "</h3>";
            echo "<h3>Tax: £" . number_format($tax, 2) . "</h3>";
            echo "<h3>Total: £" . number_format($total, 2) . "</h3>";
        }
        ?>

        <div class="calculator">
            <h2>Calculator</h2>
            <input type="text" id="display" readonly>
            <br>
            <input type="button" value="7" onclick="addToDisplay('7')">
            <input type="button" value="8" onclick="addToDisplay('8')">
            <input type="button" value="9" onclick="addToDisplay('9')">
            <input type="button" value="+" onclick="addToDisplay('+')">
            <br>
            <input type="button" value="4" onclick="addToDisplay('4')">
            <input type="button" value="5" onclick="addToDisplay('5')">
            <input type="button" value="6" onclick="addToDisplay('6')">
            <input type="button" value="-" onclick="addToDisplay('-')">
            <br>
            <input type="button" value="1" onclick="addToDisplay('1')">
            <input type="button" value="2" onclick="addToDisplay('2')">
            <input type="button" value="3" onclick="addToDisplay('3')">
            <input type="button" value="*" onclick="addToDisplay('*')">
            <br>
            <input type="button" value="0" onclick="addToDisplay('0')">
            <input type="button" value="." onclick="addToDisplay('.')">
            <input type="button" value="/" onclick="addToDisplay('/')">
            <input type="button" value="C" onclick="clearDisplay()">
            <br>
            <input type="button" value="=" onclick="calculate()" style="width: 100px;">
        </div>
    </div>

    <script>
        function addToDisplay(value) {
            document.getElementById('display').value += value;
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
        }

        function calculate() {
            try {
                document.getElementById('display').value = eval(document.getElementById('display').value);
            } catch (e) {
                document.getElementById('display').value = 'Error';
            }
        }
    </script>
</body>
</html>