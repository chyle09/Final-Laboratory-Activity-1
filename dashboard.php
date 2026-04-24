<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['name'];

// Get last visit from cookie
$lastVisit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : "First visit";

date_default_timezone_set("Asia/Manila");
$currentDateTime = date("F j, Y - h:i A");

setcookie("last_visit", $currentDateTime, time() + 86400, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 30px; /* Space after Welcome message */
            font-size: 28px;
        }

        p {
            margin: 15px 0; /* Space between the two date lines */
            font-size: 18px;
            color: #333;
        }

        .btn-logout {
            display: inline-block;
            margin-top: 30px; /* Space above logout button */
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-logout:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>

    <p><strong>Today is:</strong> <?php echo $currentDateTime; ?></p>

    <p><strong>Your last visit was:</strong> <?php echo $lastVisit; ?></p>

    <a href="logout.php" class="btn-logout">Logout</a>
</div>

</body>
</html>