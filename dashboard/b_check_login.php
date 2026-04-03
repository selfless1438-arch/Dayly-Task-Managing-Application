<?php
include "db.php";
header("Content-Type: application/json");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();

$result = $sql->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        if (isset($_POST["checkbox"])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
        }
        echo json_encode(["success" => true, "message" => "Verifeid"]);
        exit;
    } else {
        echo json_encode(["success" => false, "message" => "Wrong Password"]);
        exit;
    }
} else {
    echo json_encode(["success" => false, "message" => "This username does not exist"]);
    exit;
}
