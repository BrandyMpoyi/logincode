<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "loginsys";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? LIMIT 1"); // Changed from 'register' to 'users'
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Successful login
        echo '<a href="billing.php"><b><font color="white">Login is Successful, Continue to next page</font></b></a>';
    } else {
        // Invalid login
        echo '<a href="registration.php"><b><font color="white">Invalid login. Click here to Register</font></b></a>';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Login System</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" value="Login" class="btn">
            <input type="reset" value="Reset" class="btn">
        </form>
        <p>Not a user? <a href="registration.php" style="color: #4CAF50;">Register Here</a></p>
    </div>
</body>
</html>
