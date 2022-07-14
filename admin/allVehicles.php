<?php 
include('../config/conn.php');
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
include('../utils/generateMessage.php');
$page="allVehicles";
    ?>
<!doctype html>
<html lang="en">

<head>
 <?php  include("./inc/header.php") ?>

    <title>All Vehicles</title>
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
        <h4 class="mb-0 text-uppercase">All Vehicles</h4>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>Type of Vehicle</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>year of production</th>
                                        <th>date added</th>
                                        <th>announcement expire</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $selectVehicles = "SELECT * FROM `vehicles` INNER JOIN users ON vehicles.user_id = users.id;
                                 ";
                                    $res = mysqli_query($conn, $selectVehicles);
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($vehicle = mysqli_fetch_assoc($res)) {

                                    ?>

                                            <tr>
                                                <td><?php echo $vehicle['v_id'];  ?></td>
                                                <td><?php echo $vehicle['username'];  ?></td>
                                                <td><?php echo $vehicle['type'];  ?></td>
                                                <td><?php echo $vehicle['brand'];  ?></td>
                                                <td><?php echo $vehicle['model'];  ?></td>
                                                <td><?php echo $vehicle['year_of_prod'];  ?></td>
                                                <td><?php echo $vehicle['v_date_added'];  ?></td>
                                                <td>0</td>

                                            </tr>

                                    <?php
                                        }
                                    }else{
                                        echo "<h2>No Data Found</h2>";
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Type of Vehicle</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>year of production</th>
                                        <th>date added</th>
                                        <th>announcement expire</th>
                                    </tr>
                                </tfoot>
                            </table>
                </div>
            </div>
        </div>





















            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
  
    <?php include("./inc/footer.php")  ?>

</body>

</html>