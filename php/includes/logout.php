<?php

session_start();

session_unset();
session_destroy();  //destroying session

header("refresh:0; url=../index.php");

?>