<?php
include "db.php";
header("Content-Type: application/json");

$username = $_POST['username'];

$sql = $conn->prepare("SELECT * FROM tasks WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();

$result = $sql->get_result();

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode($data);
}
exit;
