<?php  
include("../config/conn.php");
    unset($_SESSION['admin']);
    header("Location:index.php");