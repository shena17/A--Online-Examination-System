<?php

    session_start();       //Resuming the session

    if(isset($_SESSION['username'])){     //checking whether the session is set    

        require_once('config.php');

        $uName = $_SESSION['username'];     //assigning the value of current session username to uName

        $sql = "DELETE FROM employees WHERE username = '$uName'";   //query for employee deletion

        $result = mysqli_query($conn, $sql);

        if($result){
            include_once('logout.php');
            header("location:../index.php?AccountDeletedSuccessfully");
        }
        else{
            echo '<script>
                alert("Query execution failed");
                window.location="../profile.php?ExecutionFailed";
                </script>';
        }

    }
    else{
        echo '<script>
            alert("Session error");
            window.location="../index.php?SessionEmpty";
        </script>';
    }

?>