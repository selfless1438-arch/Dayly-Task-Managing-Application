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

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();

$result = $sql->get_result();
$row = $result->fetch_assoc();
$fullname = $row['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Dayly - Task Manager</title>
    <link rel="stylesheet" href="../root.css">
    <link rel="stylesheet" href="profile_settings.css">
    <link rel="stylesheet" href="footer.css">
    <?php
    include "../links.php";
    ?>
</head>

<body>
    <main>
        <div class="profile-card ">
            <div class="card-header">
                <div class="cover-img">
                    <img src="ascents/coverbg.jpg" width="600px" alt="coverimg">
                </div>
                <div class="profile-img-cont">
                    <div class="upload-img">
                        <input readonly type="file" name="newProfileImg" accept="image/*" id="newProfileImg">
                        <i data-lucide="camera"></i>
                    </div>
                    <div class="img-profile">
                        <img id="userProfileImg" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="title-sec">
                    <div class="name">
                        <input readonly type="text" name="p_full_name" id="p_full_name">
                        <button id="role" type="button">User</button>
                    </div>
                    <div class="btn-cont">
                        <button type="button" onclick="editProfile()" id="editBtn">Edit Profile</button>
                        <button type="button" onclick="cancelChanges()" id="cancelChanges">Cancel</button>
                        <button type="button" id="saveChangesBtn">Save Changes</button>
                    </div>
                </div>
                <div class="info-cont">
                    <div>
                        <div class="m-info">
                            <div class="input-cont">
                                <label for="p_username"><i data-lucide="user"></i>Username</label>
                                <input disabled type="text" name="p_username" value="<?php echo $username; ?>" id="p_username">
                            </div>
                            <div class="input-cont">
                                <label for="p_email"><i data-lucide="mail"></i>Email Address</label>
                                <input disabled type="text" name="p_email" value="sample@mail.com" id="p_email">
                            </div>
                            <div class="input-cont">
                                <label for="p_contact"><i data-lucide="phone"></i>Contact</label>
                                <input readonly type="text" name="p_contact" value="+92-000-0000000" id="p_contact">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="o-info">
                            <div class="input-cont">
                                <label for="gender"><i data-lucide="fingerprint-pattern"></i>Gender</label>
                                <input readonly type="text" name="gender" value="----" id="gender">
                            </div>
                            <div class="input-cont">
                                <label for="birth"><i data-lucide="calendar"></i>Birth Date</label>
                                <input readonly type="date" name="birth" id="birth">
                            </div>
                            <div class="textare-cont">
                                <label for="address"><i data-lucide="map-pin-house"></i>Address</label>
                                <textarea readonly name="address" id="address">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis corrupti sed voluptate? Saepe laudantium, nobis amet quis temporibus quos debitis ex, vel natus quod rerum sapiente culpa eius alias nesciunt.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include "footer.php" ?>

    <script src="root.js"></script>
    <script src="profile_settings.js"></script>
</body>

</html>