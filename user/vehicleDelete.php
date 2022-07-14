<?php
include('../config/conn.php');
if(!isset($_SESSION['logged_in'])){
    header('Location:../login.php');
}
include('../utils/generateMessage.php');
if (isset($_GET['vId'])) {
    $id = (int) $_GET['vId'];
    $getImages = "SELECT * FROM vehicles WHERE v_id = $id";
    $result = mysqli_query($conn, $getImages);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $images = explode(",", $data['vehicle_preview_picture']);
        $main_image = $data['vehicle_main_picture'];
        unlink('./uploads/' . $main_image);
        foreach ($images as $image) {
            unlink('./uploads/' . $image);
        }
        $query = "DELETE FROM vehicles WHERE v_id = $id";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $_SESSION['message'] = generateMessage("Vehicle Deleted Successfully", "success");
            header("Location:index.php");
        } else {
            $_SESSION['message'] = generateMessage("ERROR! Something went wrong", "danger");
            header("Location:index.php");
        }
    }
}
