<?php 
require("./config/conn.php");
if(!isset($_SESSION['logged_in'])){
    header('Location:index.php');
}
require("./utils/generateMessage.php");
if(isset($_GET['reset-link'])){
    if($_SESSION['reset_key']==$_GET['reset-link']){
        $_SESSION['message'] = generateMessage("Account Varified Successfully", "success");
        $_SESSION['varified'] = true;
        header("Location:change-password.php");
    }else{
        $_SESSION['message'] = generateMessage("Validation Failed", "warning");
        header("Location:forgot-password.php");
    }
}
?>