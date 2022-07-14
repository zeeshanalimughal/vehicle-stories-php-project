<?php 
require("../config/conn.php");
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
include "../utils/generateMessage.php";
if(isset($_GET['message-id'])){

    $id = $_GET['message-id'];

    $query = "DELETE FROM contact WHERE id = $id";
    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = generateMessage("Message Deleted Successfully","success");
        header("Location:messages.php");
    }else{
        $_SESSION['message'] = generateMessage("Something Went Wrong While Processing","warning");
        header("Location:messages.php");
    }
}


?>