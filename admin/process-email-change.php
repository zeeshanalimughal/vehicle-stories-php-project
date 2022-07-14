<?php 
require("../config/conn.php");
require("../utils/generateMessage.php");
if(isset($_SESSION['reset_key'])){
if(isset($_GET['reset-link'])){
    if($_SESSION['reset_key']==$_GET['reset-link']){
        $_SESSION['message'] = generateMessage("Varified Successfully! Now you can change your email", "success");
        $_SESSION['varified'] = true;
        unset($_SESSION['reset_key']);
        header("Location:change-email-form.php");
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