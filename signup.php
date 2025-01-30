<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input to prevent harmful characters
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Check if username is valid (alphanumeric only)
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        die("Username can only contain letters and numbers");
    }

    // Validate password strength (minimum length example)
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long");
    }

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "loginsys";

    // Create a new connection to the database
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Check if connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, surname, email) VALUES (?, ?, ?, ?, ?)");
    
    // Bind the input parameters to the prepared statement
    $stmt->bind_param("sssss", $username, $hashedPassword, $firstname, $surname, $email);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Registration successful! <a href='index.php'>Login here</a>";
    } else {
        echo "Registration failed. Please try again later.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
