<?php
include('../config/conn.php');
include('../utils/generateMessage.php');
if (isset($_GET['vId'])) {
    $id = (int) $_GET['vId'];
    $updateQuery = "UPDATE vehicles SET preview_caption_status = 0 WHERE v_id = $id";
    $res = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
    if ($res) {
        $_SESSION['message'] = generateMessage("Caption deactivated Successfully", "success");
        header("Location:index.php");
    } else {
        $_SESSION['message'] = generateMessage("Something went wrong", "error");
        header("Location:index.php");
    }
}
