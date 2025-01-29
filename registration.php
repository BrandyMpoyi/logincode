<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System</title>
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
        input[type="text"], input[type="password"], input[type="email"] {
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
        <h1>Registration System</h1>
        <form method="post" action="signup.php">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required>

            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" placeholder="Firstname" required>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" placeholder="Surname" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required>

            <input type="submit" value="Register" class="btn">
            <input type="reset" value="Reset" class="btn">
        </form>
        <p>Already a user? <a href="log1.php" style="color: #4CAF50;">Login Here</a></p>
    </div>
</body>
</html>