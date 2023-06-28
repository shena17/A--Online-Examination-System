<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="sidebar">
        <div class="logo-details">
            <a href="index.php">
                <i class='bx bxl-unsplash'></i>
            </a>
            <span class="logo_name">Dashboard</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="manage_menu.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="../../php/examAdminDashboard.php">
                    <i class='bx bx-book'></i>
                    <span class="links_name">Exams</span>
                </a>
            </li>
            <li>
                <a href="../../php/examinerDashboard.php">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="links_name">Results</span>
                </a>
            </li>
            <li>
                <a href="../../php/Custom_Officer_dashboard.php">
                    <i class='bx bx-help-circle'></i>
                    <span class="links_name">Help and Support</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../../php/includes/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">A+ ONLINE EXAMINATION</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
<?php
session_start();
include_once('Db.php');
$name= $_SESSION['username'];
if(isset($name)){
    $sql = "SELECT * FROM users WHERE username='$name'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){?>

                <span class="admin_name"><?php echo $row['status'];?></span>
                <?php
        }
    }
}
            ?>
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <br><br><br><br>
        <div class="values">
            <div class="val-box">
                <span class="las la-users"></span>
                <div>
                    <h3>Manage Users</h3>
                    <a href="manage_menu.php">View</a>
                </div>
            </div>
           
            <div class="val-box">
                <span class="las la-clipboard"></span>
                <div>
                    <h3>Manage Exams</h3>
                    <a href="../../php/examDisplay.php">View</a>
                </div>
            </div>
            <div class="val-box">
                <span class="las la-wallet"></span>
                <div>
                    <h3>Manage Result </h3>
                    <a href="../../php/resultDisplay.php">View</a>
                </div>
            </div>
        </div>


        <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        </script>

</body>

</html>