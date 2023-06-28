<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/select.css">
  <link rel="stylesheet" type="text/css" href="../css/header.css">
  <title>Download</title>
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


<?php

  include 'includes/config.php';

  if(isset($_GET['answer'])){ //Check variable has decleared
      $answerScriptID=$_GET['answer']; // Get passed value
    

    $readTable="SELECT * FROM `answerscript` WHERE answerScriptID='$answerScriptID'"; //Select data from
    $readData = $conn->query($readTable);



    if ($readData->num_rows > 0){
                

      while($row = $readData->fetch_assoc()){ //Fetch data as a associative array
                              
                                 
        $file=$row['file'];
        
                              
                                
      }
                            
    
    }
  }
    
?>


<div class="div">
  <center>
<a href="<?php echo $file?>"><button id="btn1">View</button></a>
<br>
<br>
<a href="ResultSubmit.php"><button class="btn">Submit Result</button></a>
<br>
<br>
<a href="viewAnswer.php"><button class="btn">Select Another Script</button></a>
  </center>
</div>




</body>
</html>
