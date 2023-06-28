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
            $uid =$_REQUEST["uid"];
            $first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
            $nic = $_REQUEST['nic'];
            $contact = $_REQUEST['contact'];
            $email = $_REQUEST['address'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $status = $_REQUEST['status'];
            $sql = "UPDATE users SET first_name='$first_name',last_name='$last_name',NIC='$nic',contactNo='$contact',email='$email',username='$username' WHERE user_ID='$uid'";

            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="success">User Edit Successfully</div>';
                echo "<script>setTimeout(()=>{window.location.href='manage_users.php';},500);</script>";
            } else {
                $msg = '<div class="alert">User Edit Failed</div>';
            }
        }
        ?>

        <!-- Edit User -->
        <div class="products">
            <h3 class="i-name">EDIT USER</h3>

            <?php
            if (isset($_REQUEST['view'])) {
                $sql = "SELECT * FROM users WHERE User_ID={$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>

            <form style="margin-top: 25px;" class="Add" action="" method="POST">
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
                <div class="preference">
                    <label for="fname">User ID:</label>
                    <input placeholder="First Name" type="text" id="name" name="uid" value="<?php if (isset($row['user_ID'])) {
                                                                                                        echo $row['user_ID'];
                                                                                                    } ?>" readonly>
                </div>


                    <div class="preference">
                        <label for="fname">First Name:</label>
                        <input placeholder="First Name" type="text" id="name" name="first_name" value="<?php if (isset($row['first_name'])) {
                                                                                                            echo $row['first_name'];
                                                                                                        } ?>">
                    </div>
                    <div class="preference">
                        <label for="fname">Last Name:</label>
                        <input placeholder="Last Name" type="text" id="name" name="last_name" value="<?php if (isset($row['last_name'])) {
                                                                                                            echo $row['last_name'];
                                                                                                        } ?>">
                    </div>
                    <div class="preference">
                        <label for="fname">NIC:</label>
                        <input placeholder="NIC" type="text" id="name" name="nic" value="<?php if (isset($row['NIC'])) {
                                                                                                echo $row['NIC'];
                                                                                            } ?>">
                    </div>
                    <div class="preference">
                        <label for="fname">Contact No:</label>
                        <input placeholder="Contact No" type="text" id="name" name="contact" value="<?php if (isset($row['contactNo'])) {
                                                                                                        echo $row['contactNo'];
                                                                                                    } ?>">
                    </div>
                    <div class="preference">
                        <label for="lname">Email Address:</label>
                        <input placeholder="Email Address" type="text" id="address" name="address" value="<?php if (isset($row['email'])) {
                                                                                                                echo $row['email'];
                                                                                                            } ?>">
                    </div>
                    <div class="preference">
                        <label for="lname">Username:</label>
                        <input placeholder="Username" type="text" id="address" name="username" value="<?php if (isset($row['username'])) {
                                                                                                            echo $row['username'];
                                                                                                        } ?>">
                    </div>
                    <div class="preference">
                        <input placeholder="Password" type="hidden" id="address" name="status" value="ExamAdmin" readonly>
                    </div>
                    <br><br>
                    <div class="preference">
                        <input type="submit" name="add" value="Submit">
                    </div>

            </form>


        </div>
</body>

</html>