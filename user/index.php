<?php
include('../config/conn.php');
if(!isset($_SESSION['logged_in'])){
    header('Location:../login.php');
}
include('../utils/generateMessage.php');
$page="index";
?>
<!doctype html>
<html lang="en">

<head>
    <?php include('./inc/header.php')  ?>

    <title>Vehicle Stories</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper-->
       <?php include ("./inc/nav.php")  ?>
        <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">


                <h4 class="mb-0 text-uppercase">Users Pannel</h4>
                <hr />

                <?php
                $selectUser = "SELECT * FROM `users` INNER JOIN vehicles ON users.id = vehicles.user_id WHERE users.id = 14;
                                 ";
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
                                        <span class="text-black"><b><?php echo $user['username'] ?></b></span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        email
                                        <span class="text-black" style="word-break: break-all;"><b><?php echo $user['email'] ?></b>
                                        </span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        password
                                        <span class="text-black"><b>*****</b></span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        date of registration
                                        <span class="text-black"><b><?php echo $user['date_of_reg'] ?></b></span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        add/change avatar
                                        <span class="text-black"><b>
                                                <box-icon name='user-circle'></box-icon>
                                            </b></span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        number of added vehicles
                                        <span class="text-black"><b>4</b></span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    border-top-0
                                    border-start-0
                                    border-end-0
                                    border-bottom-1
                                    ">
                                        message unread
                                        <span class="text-black"><b>2</b></span>
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

                                      <a href="change-email.php">
                                      <span class="badge bg-warning mx-0 my-1 mx-sm-1 p-2 fw-normal">change</span>
                                      </a>

                                        <a href="#"> <span class="badge mx-0 mx-sm-1 bg-danger p-2 px-2 fw-normal">enter password</span></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">

                                        <span class="text-black "><br></span>
                                    </li>

                                    <li class="list-group-item border-0 bg-transparent">

                                        <span class="text-black "></span>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">

                                        <a href="add-avatar.php"> <span class="badge bg-warning opacity-50 p-2 px-2 fw-normal">add/change</span></a>

                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">

                                        <a href=""><br></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent d-flex align-items-center flex-wrap">

                                        <a href=""> <span class="badge bg-warning mx-1 my-1 opacity-50 p-2  fw-normal">read/write</span></a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                <?php    }
                ?>
















                <h4 class="mt-5 text-uppercase">List of added vehicles</h4>
                <hr />

                <span>
                    <?php if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </span>
                <span>
                    <?php if (isset($_SESSION['message-updated'])) {
                        echo $_SESSION['message-updated'];
                        unset($_SESSION['message-updated']);
                    }
                    ?>
                </span>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type of Vehicle</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>year of production</th>
                                        <th>date added</th>
                                        <th>announcement expire</th>
                                        <th>caption status</th>
                                        <th>modification of added</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $selectVehicles = "SELECT * FROM `vehicles` INNER JOIN users ON vehicles.user_id = users.id WHERE vehicles.user_id = 14;
                                 ";
                                    $res = mysqli_query($conn, $selectVehicles);
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($vehicle = mysqli_fetch_assoc($res)) {

                                    ?>

                                            <tr>
                                                <td><?php echo $vehicle['v_id'];  ?></td>
                                                <td><?php echo $vehicle['type'];  ?></td>
                                                <td><?php echo $vehicle['brand'];  ?></td>
                                                <td><?php echo $vehicle['model'];  ?></td>
                                                <td><?php echo $vehicle['year_of_prod'];  ?></td>
                                                <td><?php echo $vehicle['v_date_added'];  ?></td>
                                                <td>0</td>
                                                <td>
                                                    <?php
                                                    if ($vehicle['preview_caption_status'] == 0) {
                                                    ?>
                                                        <a class="btn btn-success" href="activate-caption.php?vId=<?php echo $vehicle['v_id'];  ?>">Activate</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="btn btn-warning" href="deactivate-caption.php?vId=<?php echo $vehicle['v_id'];  ?>">Deactivate</a>
                                                    <?php
                                                    }


                                                    ?>

                                                </td>
                                                <td class="modification"><a href="edit-vehicle.php?vId=<?php echo $vehicle['v_id'];  ?>" class="btn btn-success mx-1">edit</a><a href="vehicleDelete.php?vId=<?php echo $vehicle['v_id'];  ?>" class="btn btn-warning mx-1">delete</a></td>
                                            </tr>

                                    <?php
                                        }
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
                                        <th>modification of added</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row m-4">
                                <div class="col">
                                    <a href="add-vehicle-form.php"> <button type="button" class="btn btn-success rounded rounded-circle"><i class="bx bx-plus me-0 py-4"></i>
                                        </button></a>
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