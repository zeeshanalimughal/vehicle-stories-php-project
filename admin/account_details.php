<?php
include('../config/conn.php');
if (!isset($_SESSION['admin'])) {
    header("Location:logout.php");
}
if (isset($_GET['uId'])) {
    $userId = $_GET['uId'];
    include('../utils/generateMessage.php');

    $countVehicles = "SELECT count(v_id) FROM vehicles WHERE vehicles.user_id = $userId;";
    $countRes = mysqli_query($conn, $countVehicles);
    $count = mysqli_fetch_array($countRes);
    $count[0];
?>
    <!doctype html>
    <html lang="en">

    <head>
        <?php include("./inc/header.php") ?>
        <title> Account Ddetails</title>
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


                    <h3 class="mb-0 text-uppercase">User Account Details</h6>
                        <hr />

                        <?php
                        $selectUser = "SELECT * FROM users WHERE id =$userId;";
                        $resUser = mysqli_query($conn, $selectUser);
                        if (mysqli_num_rows($resUser) > 0) {
                            $user = mysqli_fetch_assoc($resUser);


                        ?>
                            <div class="row p-0 m-0 d-flex flex-nowrap">
                                <div class="col-8 p-0 m-0">
                                    <div class="card-body p-0 m-0">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item d-flex 
                                    
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
    
                                    justify-content-between align-items-center">
                                                user name
                                                <span class="text-black"><b><?php echo $user['username']  ?></b></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                email
                                                <span class="text-black"><b><?php echo $user['email']  ?></b>
                                                </span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                date of registration
                                                <span class="text-black"><b><?php echo $user['date_of_reg']  ?></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                last login date
                                                <span class="text-black"><b><?php echo $user['last_login']  ?></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                ip of registration
                                                <span class="text-black"><b><?php echo $user['ip_of_registration']  ?></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                ip of last login
                                                <span class="text-black"><b><?php echo $user['ip_last_login']  ?></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                number of added vehicles
                                                <span class="text-black"><b><?php echo $count[0];  ?></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                blocked to
                                                <span class="text-black"><b>2021.12.03 11:36</b></span>
                                            </li>



                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                        border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                        text-danger">
                                                <b>delete account</b>
                                                <span class="text-black"><b></b></span>
                                            </li>


                                            <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                                user rank change
                                                <span class="text-black"><b></b></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-4 p-0 m-0">
                                    <div class="card-body p-0 m-0 bg-transparent">
                                        <ul class="list-group border-0 bg-transparent">
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "><br></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent d-flex align-items-center flex-wrap">
                                                <?php
                                                if ((int)$user['status'] === 0) {
                                                ?>
                                                    <span class="badge bg-danger mx-0 my-1 mx-sm-1 p-2 fw-normal">not activated</span>
                                                <?php  } else { ?>

                                                    <a href="#"> <span class="badge mx-0 mx-sm-1 bg-success p-2 px-2 fw-normal">activat</span></a>

                                                <?php  } ?>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "><br></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "><br></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "><br></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <span class="text-black "><br></span>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <a href=""> <span class="badge bg-danger opacity-50 p-2 px-2 fw-normal">edit
                                                        date</span></a>

                                            </li>
                                            <li class="list-group-item border-0 bg-transparent">

                                                <a href=""> <span class="badge bg-danger p-2 fw-normal">enter
                                                        password</span></a>
                                            </li>
                                            <li class="list-group-item border-0 bg-transparent d-flex align-items-center flex-wrap">

                                                <a href=""> <span class="badge bg-danger mx-1 my-1 opacity-50 p-2  fw-normal">Administrator</span></a>
                                                <a href=""> <span class="badge bg-danger p-2 px-3 mx-1 fw-normal">enter
                                                        password</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            echo "<h2>User account not found</h2>";
                        }  ?>












                        <h4 class="mt-5 text-uppercase">List of added vehicles</h4>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type of Vehicle</th>
                                                <th>brand</th>
                                                <th>year of production</th>
                                                <th>date added</th>
                                                <th>date of last modification</th>
                                                <th>announcement expire</th>
                                                <th>modification of added</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $select = "SELECT * FROM `vehicles` INNER JOIN users on users.id = vehicles.user_id WHERE users.id = '{$userId}';";
                                            $res = mysqli_query($conn, $select);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($vehicles = mysqli_fetch_assoc($res)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $vehicles['v_id'] ?></td>
                                                        <td><?php echo $vehicles['type'] ?></td>
                                                        <td><?php echo $vehicles['brand'] ?></td>
                                                        <td><?php echo $vehicles['year_of_prod'] ?></td>
                                                        <td><?php echo $vehicles['v_date_added'] ?></td>
                                                        <td><?php echo $vehicles['v_date_added'] ?></td>
                                                        <td>0</td>
                                                        <td class="modification"><a href="edit-vehicle.php?vId=<?php echo $vehicles['v_id'] ?>" class="btn btn-success mx-1">edit</a><a href="delete-vehicle.php?vId=<?php echo $vehicles['v_id'] ?>" class="btn btn-warning mx-1">delete</a></td>
                                                    </tr>

                                            <?php  }
                                            } else {
                                                echo "<h3>No Vehicle Awailable</h3>";
                                            } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Type of Vehicle</th>
                                                <th>brand</th>
                                                <th>year of production</th>
                                                <th>date added</th>
                                                <th>date of last modification</th>
                                                <th>announcement expire</th>
                                                <th>modification of added</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="row m-4">
                                        <div class="col">
                                            <a href=""> <button type="button" class="btn btn-success rounded rounded-circle"><i class="bx bx-plus me-0 py-4"></i>
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
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

<?php } else {
    header("Location:dashboard.php");
}  ?>