<?php
require("./config/conn.php");
require("./utils/generateMessage.php");
if (isset($_SESSION['reset_key'])) {
    if (isset($_GET['reset-link'])) {
        if ($_SESSION['reset_key'] == $_GET['reset-link']) {

            $updateStatus = "UPDATE users SET status = 1 WHERE tocken = '{$_SESSION['reset_key']}'";
            $res = mysqli_query($conn, $updateStatus);
            if ($res) {
                $_SESSION['message-success-reset'] = generateMessage("Account Varified Successfully. You Can Login Now", "success");
                $_SESSION['varified'] = true;
                unset($_SESSION['reset_key']);
                header("Location:index.php");
            }
        } else {
            $_SESSION['message-success-reset'] = generateMessage("Validation Failed", "warning");
            header("Location:index.php");
        }
    }
} else {
    $_SESSION['message-success-reset'] = generateMessage("Link Expired, Validation Failed", "warning");
    header("Location:index.php");
}
