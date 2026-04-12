<?php
include 'db.php';
header("Content-Type: application/json");

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$birth_date = $_POST['birth_date'];
$address = $_POST['address'];

function updateData($username, $fullname, $contact, $gender, $birth_date, $address)
{
    include 'db.php';
    $sql = $conn->prepare("UPDATE users SET fullname = ? WHERE username = ?");
    $sql->bind_param("ss", $fullname, $username);
    if ($sql->execute()) {
        $stmt = $conn->prepare("UPDATE other_user_details SET date_birth = ? , contact = ? , address = ?, gender = ? WHERE username = ?");
        $stmt->bind_param("sssss", $birth_date, $contact, $address, $gender, $username);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
}

if (isset($_FILES['newProfileImg'])) {
    $fileName = $_FILES['newProfileImg']['name'];
    $tmpName = $_FILES['newProfileImg']['tmp_name'];

    $folder = "profile_images/" . $fileName;
    if (move_uploaded_file($tmpName, $folder)) {
        $ius = $conn->prepare("UPDATE other_user_details SET profile_img_path = ? WHERE username = ?");
        $ius->bind_param('ss', $folder, $username);
        $ius->execute();
         updateData($username, $fullname, $contact, $gender, $birth_date, $address);

    } else {
        echo json_encode(['success' => false]);
    }
} else {
     updateData($username, $fullname, $contact, $gender, $birth_date, $address);

}

exit;
