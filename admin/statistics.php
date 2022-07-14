<?php 
include('../config/conn.php');
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
include('../utils/generateMessage.php');
$page="statistics";
    ?>
<!doctype html>
<html lang="en">

<head>
 <?php  include("./inc/header.php") ?>

    <title>Statistics</title>
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
        <h4 class="mb-0 text-uppercase">Overall Statistics</h4>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>email</th>
                                        <th>date of reg</th>
                                        <th>last login</th>
                                        <th>ip of reg</th>
                                        <th>ip of last login</th>

                                        <th>Type of Vehicle</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>year of production</th>
                                        <th>capacity</th>
                                        <th>power</th>
                                        <th>fuel type</th>
                                        <th>transmisstion</th>
                                        <th>drive</th>
                                        <th>doors</th>
                                        <th>seats</th>
                                        <th>mileage</th>
                                        <th>country of origin</th>
                                        <th>estimated value</th>
                                        <th>yearn od current owner purchase</th>
                                        <th>Date of vehicle added</th>
                                        <th>yPlace of parking - voivodship</th>
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
                                                <td><?php echo $vehicle['email'];  ?></td>
                                                <td><?php echo $vehicle['date_of_reg'];  ?></td>
                                                <td><?php echo $vehicle['last_login'];  ?></td>
                                                <td><?php echo $vehicle['ip_of_registration'];  ?></td>
                                                <td><?php echo $vehicle['ip_last_login'];  ?></td>
                                                <td><?php echo $vehicle['type'];  ?></td>
                                                <td><?php echo $vehicle['brand'];  ?></td>
                                                <td><?php echo $vehicle['model'];  ?></td>
                                                <td><?php echo $vehicle['year_of_prod'];  ?></td>
                                                <td><?php echo $vehicle['capacity'];  ?></td>
                                                <td><?php echo $vehicle['power'];  ?></td>
                                                <td><?php echo $vehicle['fuel_type'];  ?></td>
                                                <td><?php echo $vehicle['transmission'];  ?></td>
                                                <td><?php echo $vehicle['drive'];  ?></td>
                                                <td><?php echo $vehicle['doors'];  ?></td>
                                                <td><?php echo $vehicle['seats'];  ?></td>
                                                <td>0</td>
                                                <td><?php echo $vehicle['origin_country'];  ?></td>
                                                <td><?php echo $vehicle['est_value'];  ?></td>
                                                <td><?php echo $vehicle['current_owner_purch_date'];  ?></td>
                                                <td><?php echo $vehicle['v_date_added'];  ?></td>
                                                <td><?php echo $vehicle['location'];  ?></td>

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