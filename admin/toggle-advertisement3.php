<?php
if (isset($_GET['status'])) {
    include('../config/conn.php');
    include("../utils/generateMessage.php");

    if (!isset($_SESSION['admin'])) {
        header("Location:logout.php");
    }

    $status = (int)$_GET['status'];

    if ($status === 1) {
        $updateAddQuery = "UPDATE advertisement SET status = 1 WHERE id = 3";
        $res = mysqli_query($conn, $updateAddQuery) or die(mysqli_error($conn));
        $_SESSION['advertise'] = generateMessage("Advertisements activated successfully", "success");
        header("Location:advertisements.php");
        // echo $status;
        

    } else {
        $updateAddQuery = "UPDATE advertisement SET status = 0 WHERE id = 3";
        $res = mysqli_query($conn, $updateAddQuery)or die(mysqli_error($conn));
        $_SESSION['advertise'] = generateMessage("Advertisements deactivated successfully", "success");
        header("Location:advertisements.php");
        // echo $status;
    }
} else {
    header("Location:logout.php");
}
