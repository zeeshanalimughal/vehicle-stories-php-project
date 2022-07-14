<?php 
require("../config/conn.php");
require("../utils/generateMessage.php");
if(isset($_SESSION['reset_key'])){
if(isset($_GET['reset-link'])){
    if($_SESSION['reset_key']==$_GET['reset-link']){
        $updateEmail = "UPDATE users SET status = 1 WHERE username='{$_SESSION['logged_in']}'";
        $_SESSION['message'] = generateMessage("email changed successfully", "success");
        $_SESSION['varified'] = true;
        unset($_SESSION['reset_key']);
        header("Location:index.php");
    }else{
        $_SESSION['message'] = generateMessage("Validation Failed", "warning");
        header("Location:index.php");
    }
}
}else{
    $_SESSION['message'] = generateMessage("Validation Failed", "warning");
    header("Location:index.php");
}
?>