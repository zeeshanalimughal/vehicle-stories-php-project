<?php
include('../config/conn.php');
if(!isset($_SESSION['logged_in'])){
    header('Location:../login.php');
}
include('../utils/generateMessage.php');
if (isset($_GET['vId'])) {
    $id = (int) $_GET['vId'];
    $updateQuery = "UPDATE vehicles SET preview_caption_status = 1 WHERE v_id = $id";
    $res = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
    if($res) {
$_SESSION['message'] = generateMessage("Caption activated Successfully","success");
header("Location:index.php");
}else{
        $_SESSION['message'] = generateMessage("Something went wrong","error");
        header("Location:index.php");
    }

}
