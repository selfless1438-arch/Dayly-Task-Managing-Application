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
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="modals.css">
    <?php
    include "../links.php";
    ?>
</head>

<body>
    <div class="gifs-cont" id="congGift">
        <img src="ascents/popup.gif" alt="">
    </div>
    <main>
        <div class="title-card">
            <h1>👋 <?php echo $fullname ?>, Welcome Back</h1>
            <button class="logout-btn" type="button" onclick="window.location = 'logout.php'"> <i data-lucide="log-out"></i> Log Out</button>
        </div>
        <div class="griding-box">
            <div>
                <div class="stats-cont">
                    <div class="pie-chart">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="previous-history">
                        <div class="history-card" id="HLDay">
                            <div class="cover">
                                These stats will un covered after 1 Day.
                            </div>
                            <span class="per">56%</span>
                            <p class="desc">Yesterday</p>
                            <div class="tagline">
                                <p class="total">
                                    <span></span> Toltal: 12
                                </p>
                                <p class="com">
                                    <span></span> Completed: 10
                                </p>
                            </div>
                        </div>
                        <div class="history-card" id="hLWeek">
                            <div class="cover">
                                These stats will un covered after 07 Days. 
                            </div>
                            <span class="per">60%</span>
                            <p class="desc">Last Week</p>
                            <div class="tagline">
                                <p class="total">
                                    <span></span> Toltal: 12
                                </p>
                                <p class="com">
                                    <span></span> Completed: 10
                                </p>
                            </div>
                        </div>
                        <div class="history-card" id="HLDecade">
                            <div class="cover">
                                These stats will un covered after 10 Days. 
                            </div>
                            <span class="per">45%</span>
                            <p class="desc">Last 10 Days</p>
                            <div class="tagline">
                                <p class="total">
                                    <span></span> Toltal: 12
                                </p>
                                <p class="com">
                                    <span></span> Completed: 10
                                </p>
                            </div>
                        </div>
                        <div class="history-card" id="HLHMonth">
                            <div class="cover">
                                These stats will un covered after 15 Days. 
                            </div>
                            <span class="per">61%</span>
                            <p class="desc">Last 15 Days</p>
                            <div class="tagline">
                                <p class="total">
                                    <span></span> Toltal: 12
                                </p>
                                <p class="com">
                                    <span></span> Completed: 10
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="stat-chart">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="tasks-grid">
                <div class="tasks-cont">
                    <div class="header">
                        <span class="title">Tasks</span>
                        <button type="button" onclick="openModal('addNewTask')">
                            <i data-lucide="plus"></i>
                        </button>
                    </div>
                    <input type="hidden" name="taskLoaderUser" id="taskLoaderUser" value="<?php echo $username ?>">
                    <div class="body" id="tasksContBody">
                        <div id="taskBodyLoader">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include "footer.php" ?>
    
    <!-- Modals -->
    <?php include "modals.php" ?>

    <script src="root.js"></script>
    <script src="script.js"></script>
    <script src="modals.js"></script>
</body>

</html>