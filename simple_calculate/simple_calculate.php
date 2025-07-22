<?php
require_once "config/constant.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e8f0fe;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculator {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .calculator:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 26px;
            margin-bottom: 30px;
        }

        input[type="text"], button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #dcdcdc;
            font-size: 18px;
            transition: border 0.3s ease-in-out;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .operations {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            width: 100%;
        }

        .operations label {
            font-size: 20px;
            color: #333;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        #historyList {
    display: none;
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    background-color: #ffffff; /* تأكد من أن الخلفية البيضاء تطبق هنا */
    max-width: 100%; /* جعل الخلفية تتوسع إلى العرض الكامل للحاوية */
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%; /* جعل الجدول يأخذ العرض الكامل للحاوية */
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            table-layout: auto; /* السماح للأعمدة بالتوسع بناءً على المحتوى */
        }

        th, td {
            padding: 10px 15px; /* المسافات بين النص والحواف */
            text-align: left;
            border: 1px solid #ddd; /* تقليل سمك الحدود */
            word-wrap: break-word; /* السماح بكسر النصوص الطويلة */
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        #historyBtn {
                    display: block;
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-size: 20px;
                    text-align: center;
                    margin: 30px auto;
                    cursor: pointer;
                    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
                }

                #historyBtn:hover {
                    background-color: #45a049;
                    transform: translateY(-2px);
                }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Simple Calculator</h2>
        <form action="" method="POST">
            <input type="text" name="num1" placeholder="Enter first number" required><br>
            
            <div class="operations">
                <label>
                    <input type="radio" name="operation" value="add" required> +
                </label>
                <label>
                    <input type="radio" name="operation" value="subtract"> -
                </label>
                <label>
                    <input type="radio" name="operation" value="multiply"> *
                </label>
                <label>
                    <input type="radio" name="operation" value="divide"> /
                </label>
                
            </div>

            <input type="text" name="num2" placeholder="Enter second number" required><br>

            <button type="submit">Calculate</button>
        </form>

        <a href="#" id="historyBtn" style="display: inline-block; 
        background-color: #4CAF50; color: white; 
        padding: 10px 15px; border-radius: 5px; 
        text-decoration: none; font-size: 18px; 
        text-align: center; margin-top: 10px; cursor: pointer;">
        History
        </a>

        <div class="result">
            <?php
                $result = ''; // تأكد من تهيئة المتغير result

                if (isset($_POST['operation'])) {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operation = $_POST['operation'];
                    $Operation_time = date('Y-m-d H:i:s');

                    if (is_numeric($num1) && is_numeric($num2)) {
                        switch ($operation) {
                            case 'add':
                                $result = $num1 + $num2;
                                break;
                            case 'subtract':
                                $result = $num1 - $num2;
                                break;
                            case 'multiply':
                                $result = $num1 * $num2;
                                break;
                            case 'divide':
                                if ($num2 != 0) {
                                    $result = $num1 / $num2;
                                } else {
                                    echo "Cannot divide by zero.";
                                }
                                break;
                            default:
                                echo "Please select a valid operation.";
                        }
                        echo "Result: " . $result;

                        // إدخال البيانات في قاعدة البيانات بعد إجراء الحساب
                        $sql = "INSERT INTO calculate SET 
                            number1='$num1',
                            number2='$num2',
                            operation='$operation',
                            result='$result',
                            operation_time='$Operation_time'";

                        $result_db = mysqli_query($con, $sql);
                        if (!$result_db) {
                            echo "Database insertion failed.";
                        }
                    } else {
                        echo "Please enter valid numbers.";
                    }
                }
            ?>
        </div>
    </div>

    <div id="historyList">
        <table>
            <tr>
                <th>Number 1</th>
                <th>Number 2</th>
                <th>Operation</th>
                <th>Result</th>
                <th>Operation Time</th>
            </tr>
            <?php
            $sql = "SELECT * FROM calculate";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    $number1 = $row['number1'];
                    $number2 = $row['number2'];
                    $operation = $row['operation'];
                    $result = $row['result'];
                    $Operation_time = $row['operation_time'];
                    echo "<tr>
                            <td>{$number1}</td>
                            <td>{$number2}</td>
                            <td>{$operation}</td>
                            <td>{$result}</td>
                            <td>{$Operation_time}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No History Available</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        document.getElementById("historyBtn").onclick = function() {
            var historyList = document.getElementById("historyList");
            if (historyList.style.display === "none") {
                historyList.style.display = "block";
            } else {
                historyList.style.display = "none";
            }
        };
    </script>

</body>
</html>
