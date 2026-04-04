<?php
include "db.php";
session_start();

// Auto Login using cookie
if (!isset($_SESSION['loggedin']) && isset($_COOKIE['username'])) {

    $username = $_COOKIE['username'];

    $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();

    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    }
}


// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Dayly - Task Manager</title>
    <link rel="stylesheet" href="../root.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>welcome from dashboard</h1>
    <a href="logout.php">Logout</a>
</body>

</html>