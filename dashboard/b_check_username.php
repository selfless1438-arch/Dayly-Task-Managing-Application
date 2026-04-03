<?php
include "db.php";
header("Content-Type: application/json");
$username = $_POST["username"];

$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();

$result = $sql->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false]);
    exit;
} else {
    echo json_encode(["success" => true]);
    exit;
}
?>