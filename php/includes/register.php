<?php

use LDAP\Result;

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $NIC = $_POST['nic'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $pass = $_POST['pwd'];
    $pwd = md5($pass);

    if(isset($_POST['submit'])){
        
        if(empty($userName) || empty($pwd)){
            echo '<script>
                window.location="../signup.php";
                alert("Empty fields");
                </script>';
            exit();
        }
        else{

            require_once ('config.php');

            $sql = "SELECT username FROM employees WHERE username = '$userName'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){      //checking whether the username exists 
                echo '<script>
                alert("Username exists");
                window.location="../signup.php";
                </script>';                
                exit();
            }  
            else if(!$result){
                echo '<script>
                alert("Query failed");
                window.location="../signup.php";
                </script>';                
                exit();
            }
            else{

                //Inserting information into employees table
               $sql = "INSERT INTO `employees`(`first_name`, `last_name`, `NIC`, `contactNo`, `email`, `username`, `password`) VALUES ('$fname', '$lname', '$NIC', '$contactNo', '$email', '$userName', '$pwd')";

            
               if($result = mysqli_query($conn, $sql)){
                  header("location:../login.php?RegistrationSuccessful");
               }else{
                    echo '<script>
                    alert("An error occured while you are trying to submit the form");
                    window.location="../signup.php";
                    </script>';
                    exit();
               }
            }
        }



    }
    else{
        echo '<script>
        alert("Empty fields");
        window.location="../signup.php";
        </script>';
        exit();
    }


?>
