<?php

require('config.php');

if(isset($_POST['submit'])){       //checking whether the submit button is set

    $username = $_POST['username'];     //assigning values for variables from super global variables
    $password = $_POST['pwd'];
    $password = md5($password);     //Encrypting password

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);
    
    if(!($result)){
        
        die ("Query failed : " .mysqli_error($conn));
    }
    else{
        while($row = mysqli_fetch_assoc($result)){
            $db_username = $row['username'];
            $db_password = $row['password'];
            $db_status = $row['status'];
        }

        if($db_username != $username){
            $msg = "Invalid username";
            echo "<script>alert('$msg')</script>";
            header("refresh:0; url=../stafflogin.php?InvalidUsername");
        }
        else if($db_password != $password){
            $msg = "Invalid password";
            echo "<script>alert('$msg')</script>";
            header("refresh:0; url=../stafflogin.php?InvalidPassword");
        }
        else if($db_username == $username && $db_password == $password){
            
            session_start();
            $_SESSION['username'] = $db_username;   //Creating a session
            
            
            //Directing user to their dashboard after successful login
            if($db_status == "Administrator"){
                header("refresh:0, url=../../Admin Dashboard/Admin/index.php");
            }
            else if($db_status == "Examiner"){
                header("refresh:0, url=../examinerDashboard.php");
            }
            else if($db_status == "ExamAdmin"){
                header("refresh:0, url=../examAdminDashboard.php");
            }
            else if($db_status == "SupportOfficer"){
                header("refresh:0, url=../Custom_Officer_dashboard.php");
            }
            
        }

    }

}else{
    $msg = "Empty fields";
    echo "<script>alert('$msg')</script>";
    header("refresh:0; url=../stafflogin.php?EmptyFields");

}
