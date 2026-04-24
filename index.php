<?php
session_start();


if (isset($_SESSION['name'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

     
        .login-container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        input {
            margin-bottom: 15px;
            padding: 8px;
            width: 200px;
        }

        button {
            padding: 8px 20px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Daily Check-In Tracker</h2>
        <form method="POST">
            <label>Enter your name:</label><br>
            <input type="text" name="name" required>
            <br>
            <button type="submit">Check In</button>
        </form>
    </div>

</body>
</html>