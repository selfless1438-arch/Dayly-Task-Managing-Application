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
    <title>Dashboard | Dayly - Task Manager</title>
    <link rel="stylesheet" href="../root.css">
    <link rel="stylesheet" href="style.css">
    <?php
    include "../links.php";
    ?>
</head>

<body>
    <main>
        <div class="title-card">
            <h1>👋 <?php echo $fullname ?>, Welcome Back</h1>
            <button class="logout-btn" type="button" onclick="window.location = 'logout.php'"> <i data-lucide="log-out"></i> Log Out</button>
        </div>
        <div class="griding-box">
            <div class="stats-cont">
                <div class="pie-chart">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="previous-history">
                    <div class="history-card">
                        <span class="per">56%</span>
                        <p class="tagline">Yesterday</p>
                    </div>
                    <div class="history-card">
                        <span class="per">60%</span>
                        <p class="tagline">Last Week</p>
                    </div>
                    <div class="history-card">
                        <span class="per">45%</span>
                        <p class="tagline">Last 10 Days</p>
                    </div>
                    <div class="history-card">
                        <span class="per">61%</span>
                        <p class="tagline">Last 15 Days</p>
                    </div>
                </div>
                <div class="stat-chart">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="tasks-grid">
                <div class="tasks-cont">
                    <div class="header">
                        <span class="title">Tasks</span>
                        <button type="button" onclick="">
                            <i data-lucide="plus"></i>
                        </button>
                    </div>
                    <div class="body">
                        <div class="task-card active">
                            <div class="upper">
                                <span class="heading">Done Home Work.</span>
                                <button type="button" onclick="">
                                    <i data-lucide="chevron-down"></i>
                                </button>
                            </div>
                            <div class="lower">
                                <p class="desc">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem molestiae eaque esse!
                                </p>
                                <div class="btn-cont">
                                    <button type="button">Delete</button>
                                    <button type="button">Done</button>
                                    <button type="button">In Process</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-card ">
                            <div class="upper">
                                <span class="heading">Done Home Work.</span>
                                <button type="button" onclick="">
                                    <i data-lucide="chevron-down"></i>
                                </button>
                            </div>
                            <div class="lower">
                                <p class="desc">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem molestiae eaque esse!
                                </p>
                                <div class="btn-cont">
                                    <button type="button">Delete</button>
                                    <button type="button">Done</button>
                                    <button type="button">In Process</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-card ">
                            <div class="upper">
                                <span class="heading">Done Home Work.</span>
                                <button type="button" onclick="">
                                    <i data-lucide="chevron-down"></i>
                                </button>
                            </div>
                            <div class="lower">
                                <p class="desc">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem molestiae eaque esse!
                                </p>
                                <div class="btn-cont">
                                    <button type="button">Delete</button>
                                    <button type="button">Done</button>
                                    <button type="button">In Process</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <ul>
            <li>
                <a href="">
                    <i data-lucide="house"></i>
                    <span class="name">Home</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i data-lucide="clipboard-list"></i>
                    <span class="name">Tasks</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i data-lucide="chart-pie"></i>
                    <span class="name">Stats</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="https://avatars.githubusercontent.com/u/249313678?v=4" width="40px" alt="profile">
                    <span class="name">Profile</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i data-lucide="log-out"></i>
                    <span class="name">Logout</span>
                </a>
            </li>
        </ul>
    </footer>
    <script src="script.js"></script>
    <script src="root.js"></script>
</body>

</html>