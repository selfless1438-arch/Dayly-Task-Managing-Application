<?php
include 'db.php';
header("Content-Type: application/json");

$id = $_POST["id"];
$sql = $conn->prepare("DELETE FROM tasks WHERE id = ?");
$sql->bind_param("i", $id);
if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}

exit;
