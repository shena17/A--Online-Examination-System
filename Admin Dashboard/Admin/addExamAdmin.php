<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Manage Users</title>
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
            </div>
        </nav>


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


<?php
        include_once('Db.php');
        if (isset($_REQUEST["add"])) {
            if (($_REQUEST['first_name'] == "") || ($_REQUEST['last_name'] == "") || ($_REQUEST['nic'] == "")  || ($_REQUEST['contact'] == "")  || ($_REQUEST['address'] == "") || ($_REQUEST['username'] == "") || ($_REQUEST['password'] == "") ) {
                $msg = '<div class="alert">Name And Email Required.</div>';
            } else {
                $first_name = $_REQUEST['first_name'];
                $last_name = $_REQUEST['last_name'];
                $nic = $_REQUEST['nic'];
                $contact = $_REQUEST['contact'];
                $email = $_REQUEST['address'];
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $password = md5($password);
                $status = $_REQUEST['status'];
                $sql = "INSERT INTO users(first_name, last_name, NIC,contactNo, email, username, password, status) VALUES ('$first_name','$last_name','$nic','$contact','$email','$username','$password','$status')";
                if ($conn->query($sql) == TRUE) {
                    $msg = '<div class="success">User Added Successfully</div>';
                    echo "<script>setTimeout(()=>{window.location.href='manage_users.php';},500);</script>";
                } else {
                    $msg = '<div class="alert">User Added Failed</div>';
                }
            }
        }
        ?>

        <!-- Exam Admin -->
        <div class="products">
            <h3 class="i-name">Add Exam Admin</h3>

            <form style="margin-top: 25px;" class="Add" action="" method="POST">
                <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <div class="preference">
                <label for="fname">First Name:</label>
                <input placeholder="First Name" type="text" id="name" name="first_name">
                </div>
                <div class="preference">
                <label for="fname">Last Name:</label>
                <input placeholder="Last Name" type="text" id="name" name="last_name"></div>
                <div class="preference">
                <label for="fname">NIC:</label>
                <input placeholder="NIC" type="text" id="name" name="nic"></div>
                <div class="preference">
                <label for="fname">Contact No:</label>
                <input placeholder="Contact No" type="text" id="name" name="contact"></div>
                <div class="preference">
                <label for="lname">Email Address:</label>
                <input placeholder="Email Address" type="text" id="address" name="address"></div>
                <div class="preference">
                <label for="lname">Username:</label>
                <input placeholder="Username" type="text" id="address" name="username"></div>
                <div class="preference">
                <label for="lname">Password:</label>
                <input placeholder="Password" type="text" id="address" name="password">
                </div>
                <div class="preference">
                <input placeholder="Password" type="hidden" id="address" name="status" value="ExamAdmin" readonly></div>
                <br><br>
                <div class="create">
                <input type="submit" name="add" value="Submit">
                </div>
                
            </form>
            

        </div>
</body>

</html>