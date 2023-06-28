<?php

require('config.php');

if(isset($_POST['submit'])){       //checking whether the submit button is set

    $username = $_POST['username'];     //assigning values for variables from super global variables
    $password = $_POST['pwd'];
    $password = md5($password);     //Encrypting password

    $sql = "SELECT * FROM employees WHERE username = '$username'";      //query for checking where

    $result = mysqli_query($conn, $sql);
    
    if(!($result)){
        
        die ("Query failed : " .mysqli_error($conn));
    }
    else{
        while($row = mysqli_fetch_assoc($result)){      //assigning association array to $row
            $db_username = $row['username'];
            $db_password = $row['password'];
        }

        if($db_username != $username){      //checking whether the username is valid
            $msg = "Invalid username";
            echo "<script>alert('$msg')</script>";
            header("refresh:0; url=../login.php?InvalidUsername");
        }
        else if($db_password != $password){     //validating password
            $msg = "Invalid password";
            echo "<script>alert('$msg')</script>";
            header("refresh:0; url=../login.php?InvalidPassword");
        }
        else if($db_username == $username && $db_password == $password){    //validating username and password
            
            session_start();
            $_SESSION['username'] = $db_username;   //Creating a session
            
            header("refresh:0; url=../index.php?LoginSuccessful");
        }

    }

}else{
    $msg = "Empty fields";
    echo "<script>alert('$msg')</script>";
    header("refresh:0; url=../login.php?EmptyFields");

}
