<?php
include 'db.php';
header("Content-Type: application/json");

$username = $_POST["username"];

$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$user_table = $result->fetch_assoc();

$stmt = $conn->prepare("SELECT * FROM other_user_details WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result2 = $stmt->get_result();
$other_data = $result2->fetch_assoc();


$data = [
    "profileImg" => $other_data['profile_img_path'] ?? '',
    "fullname" => $user_table['fullname'] ?? '',
    "email" => $user_table['email'] ?? '',
    "role" => $user_table['role'] ?? '',
    "contact" =>  $other_data['contact'] ?? '',
    "gender" => $other_data['gender'] ?? '',
    "birth" => $other_data['date_birth'] ?? '',
    "address" => $other_data['address'] ?? ''
];

echo json_encode($data);
exit;
