<!DOCTYPE html>
<html>
<head>
    <title>Calculator System</title>
    <style>
        .style1 {
            border: solid gray 0px;
            width: 220px;
            border-radius: 5px;
            margin: 20px auto;
            background: white;
            padding: 10px;
            text-align: center;
        }
        .style2 {
            border: solid gray 10px;
            border-radius: 5px;
            background: gray;
            color: #ddd333;
            padding: 10px;
        }
        .cbtn {
            width: 50px;
            height: 40px;
            font-size: 25px;
            border-radius: 8px;
            margin: 3px;
        }
        .display {
            width: 212px;
            height: 40px;
            text-align: right;
            font-size: 30px;
            border-radius: 8px;
            margin: 5px;
        }
    </style>
</head>
<body bgcolor="#000000">
    <div class="style1">
        <form name="Calculator" class="style2">
            <input name="display" class="display" placeholder="0" readonly />
            <br>
            <input type="button" value="7" onclick="appendValue('7')" class="cbtn"/>
            <input type="button" value="8" onclick="appendValue('8')" class="cbtn"/>
            <input type="button" value="9" onclick="appendValue('9')" class="cbtn"/>
            <input type="button" value="+" onclick="appendValue('+')" class="cbtn"/>
            <br>
            <input type="button" value="4" onclick="appendValue('4')" class="cbtn"/>
            <input type="button" value="5" onclick="appendValue('5')" class="cbtn"/>
            <input type="button" value="6" onclick="appendValue('6')" class="cbtn"/>
            <input type="button" value="-" onclick="appendValue('-')" class="cbtn"/>
            <br>
            <input type="button" value="1" onclick="appendValue('1')" class="cbtn"/>
            <input type="button" value="2" onclick="appendValue('2')" class="cbtn"/>
            <input type="button" value="3" onclick="appendValue('3')" class="cbtn"/>
            <input type="button" value="*" onclick="appendValue('*')" class="cbtn"/>
            <br>
            <input type="button" value="0" onclick="appendValue('0')" class="cbtn"/>
            <input type="button" value="%" onclick="appendValue('%')" class="cbtn"/>
            <input type="button" value="." onclick="appendValue('.')" class="cbtn"/>
            <input type="button" value="/" onclick="appendValue('/')" class="cbtn"/>
            <br>
            <input type="button" value="=" onclick="calculate()" style="width:101px; height:40px; font-size:30px; border-radius:8px; margin:3px"/>
            <input type="button" value="C" onclick="clearDisplay()" style="width:101px; height:40px; font-size:30px; border-radius:8px"/>
        </form>
    </div>
    <script>
        function appendValue(val) {
            document.Calculator.display.value += val;
        }
        function clearDisplay() {
            document.Calculator.display.value = "";
        }
        function calculate() {
            try {
                document.Calculator.display.value = eval(document.Calculator.display.value);
            } catch (e) {
                document.Calculator.display.value = "Error";
            }
        }
    </script>
</body>
</html>
