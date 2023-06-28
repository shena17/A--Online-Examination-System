<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/header.css"> <!--connect css files-->
    <link rel="stylesheet" type="text/css" href="../css/footer.css"> <!--connect css files-->
    <link rel="stylesheet" type="text/css" href="../css/view.css"> <!--connect css files-->
    
    <title>View Answer</title>
</head>

<body>

    <header>
        <div class="header">
            <a href="#" class="logo-text"><img src="../images/logo.png" alt="logo" class="logo"><span
                    class="aPlus">A+</span><span class="exams-logo">Exams</span></a>

            <nav class="nav-bar">
             
            </nav>
        </div>
    </header>

    <center>
        <div id="div1">
            <h2>Choose Your Answer Script</h2><br><br><br><br><br> 
            <fieldset id="fieldset">

                <table class='table'> <!--table for display answer sheet and details-->
                    <thead>
                        <tr>
                            
                            <th scope ="col" class='th1'>Exam ID</th>
                            <th scope ="col" class='th1'>Enrollment Key</th>
                            <th scope ="col" class='th1'>Student ID</th>
                            <th scope ="col" class='th1' align="center">Operation</th>
                    
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            include 'includes/config.php';
                            //include 'view.php'; //connect php file

                            $sql="SELECT * FROM `answerscript`"; //Select data from answerscript table

                            $result=mysqli_query($conn,$sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){ //Fetch data row as an associative array

                                    //Assign data to variables

                                    $answerScriptID= $row['answerScriptID'];
                                    $examID = $row["examID"];
                                    $enrolmentKey = $row["enrolmentKey"];
                                    $stuID = $row["stuID"];
                                    
                                
                                    //Display data in table
                                    echo
                                    '<tr>
                                        <td>'.$examID.'</td>
                                        <td>'.$enrolmentKey.'</td>
                                        <td>'.$stuID.'</td>                             
                                        <td id="op"><a class="a" href="view.php?answer='.$answerScriptID.'"><button class="delete">Load</button></a> 
                                            
                                        </td>

                                    </tr>';
                                }
                                
                            }
/*<a class="a" href="<?php echo $file?>"><button class="edit">Downloads</button></a>*/
                        ?>
                        
                    </tbody>
                </table>  
            </fieldset>
            
        </div>
        <br>
        <a href="ResultSubmit.php"><button id="finish"> Submit Result </button></a><br><br> <!--Submit button-->
    </center>

    <div class="last">
        <a href="examinerDashboard.php"><button class="add">Dashboard</button></a>
    </div>

    <!-- FOOTER -->
    <br />
    <br />

</body>


</html>
            