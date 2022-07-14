<?php  
include("./config/conn.php");
if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    header("Location:index.php");
}else{
    header("Location:index.php");
}
