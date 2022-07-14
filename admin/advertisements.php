<?php
require("../config/conn.php");
if (!isset($_SESSION['admin'])) {
    header("Location:logout.php");
}
$page = "advertizement";
?>
<!doctype html>
<html lang="en">

<head>
    <?php include './inc/header.php'  ?>

    <title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper-->
        <?php include("./inc/nav.php")  ?>

        <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">










                <!--end breadcrumb-->
                <h4 class="mb-0 text-uppercase">Turn on and off Advertisements</h4>
                <hr />


                <?php
                if (isset($_SESSION['advertise'])) {

                    echo '<div class="row my-4">
                                <div class="col-12">
                                ' . $_SESSION['advertise'] . '
                                </div>
                            </div>';
                    unset($_SESSION['advertise']);
                }  ?>


                <div class="row my-5">
                    <div class="h4">Home Page </div>
                    <div class="col-12">
                        <?php
                        $selectAdd = "SELECT status from advertisement WHERE id = 1";
                        $res = mysqli_query($conn, $selectAdd);
                        $status = mysqli_fetch_array($res);
                        if ((int)$status[0] === 1) {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-success">active</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement.php?status=0">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-warning px-5 btn-lg">Deactivate</button>
                                    </a>
                                </div>
                            </div>

                        <?php  }
                        if ((int)$status[0] === 0) { ?>

                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-danger">deactive</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement.php?status=1">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-success px-5 btn-lg">Activate</button>
                                    </a>
                                </div>
                            </div>
                        <?php }  ?>

                    </div>
                </div>










                

                <div class="row my-5">
                    <div class="h4">Vehicle Details page </div>
                    <div class="col-12">
                        <?php
                        $selectAdd2 = "SELECT status from advertisement WHERE id = 2";
                        $res2 = mysqli_query($conn, $selectAdd2);
                        $status2 = mysqli_fetch_array($res2);
                        if ((int)$status2[0] === 1) {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-success">active</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement2.php?status=0">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-warning px-5 btn-lg">Deactivate</button>
                                    </a>
                                </div>
                            </div>

                        <?php  }
                        if ((int)$status2[0] === 0) { ?>

                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-danger">deactive</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement2.php?status=1">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-success px-5 btn-lg">Activate</button>
                                    </a>
                                </div>
                            </div>
                        <?php }  ?>

                    </div>
                </div>












                

                <div class="row my-5">
                    <div class="h4">Gallery Page </div>
                    <div class="col-12">
                        <?php
                        $selectAdd3 = "SELECT status from advertisement WHERE id = 3";
                        $res3 = mysqli_query($conn, $selectAdd3);
                        $status3 = mysqli_fetch_array($res3);
                        if ((int)$status3[0] === 1) {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-success">active</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement3.php?status=0">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-warning px-5 btn-lg">Deactivate</button>
                                    </a>
                                </div>
                            </div>

                        <?php  }
                        if ((int)$status3[0] === 0) { ?>

                            <div class="row">
                                <div class="col-12">
                                    <h1>Status: <span class="text-danger">deactive</span></h1>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="toggle-advertisement3.php?status=1">

                                        <button type="button" style="border-radius: 30px !important; font-size: 28px;" class="btn btn-success px-5 btn-lg">Activate</button>
                                    </a>
                                </div>
                            </div>
                        <?php }  ?>

                    </div>
                </div>







            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->


    <?php include("./inc/footer.php")  ?>


</body>

</html>