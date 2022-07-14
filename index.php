<?php
require("./config/conn.php");
require("./utils/generateMessage.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./inc/header.php')  ?>

    <title>Home</title>
</head>

<body>

    <?php include('./inc/nav.php')  ?>


    <section class="hero">
        <h1 class="hero_title">Present Your Vehicle</h1>
        <p class="desc">Show what makes you stand out</p>
    </section>


    <section class="filter justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-items-center w-100">
            <div class="col-lg-1"></div>
            <div class="col-lg-9 col-md-10 col-sm-12 p-0 d-flex justify-content-center align-items-center">
                <form action="" class="filter_inputs_box w-100 p-0 justify-content-center align-items-center">
                    <div class="row w-100 drop_down_box justify-content-center align-items-center">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="field">
                                <p class="drop_down_title">Type of vehicle</p>
                                <select name="type" id="">
                                    <option value="" disabled selected>Select type of Vehicle</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="field">
                                <p class="drop_down_title">Brand</p>
                                <select name="type" id="">
                                    <option value="" disabled selected>Select Brand</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="row">
                                <p class="drop_down_title">Year of production</p>
                                <div class="col-6">
                                    <div class="field">
                                        <select name="type" id="">
                                            <option value="" disabled selected>From</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="field">
                                        <select name="type" id="">
                                            <option value="" disabled selected>To</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="field">
                                <p class="drop_down_title">Location</p>
                                <select name="type" id="">
                                    <option value="" disabled selected>Location</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-1 bg-light"></div>
        </div>
    </section>




    <section class="main">
        <div class="container-fluid">
            <div class="row position-relative d-flex justify-content-between w-100">
                <div class="col-lg-1 col-md-12">
                    <?php  
                    $selectAdvertizement = "SELECT status FROM advertisement WHERE id=1";
                    $res = mysqli_query($conn, $selectAdvertizement);
                    $status = mysqli_fetch_assoc($res);
                    if($status['status']==1){
                    ?>
                    <div class="add_box">
                        <p class="add">Advertising space on off by the administrator</p>
                    </div>
                    <?php  } ?>
                </div>
                <div class="col-lg-9 col-md-12  p-0 d-flex justify-content-center">
                    <div class="row d-flex justify-content-center">

                        <?php
                        $selectVehicles = "SELECT * FROM `vehicles` INNER JOIN users ON vehicles.user_id = 14;
                        ";
                        $res = mysqli_query($conn, $selectVehicles);
                        if (mysqli_num_rows($res) > 0) {
                            while ($vehicle = mysqli_fetch_assoc($res)) {

                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                                    <a href="vehicleDetails.php?vId=<?php echo $vehicle['v_id'] ?>" style="color: inherit;">
                                        <div class="car_box">
                                            <div class="car_image">
                                                <img src="./user/uploads/<?php echo $vehicle['vehicle_main_picture'];  ?>" alt="">
                                            </div>
                                            <div class="content_box">
                                                <label class="car_title"><?php echo $vehicle['type']  ?> <span> <?php echo $vehicle['brand'] ?></span></label>

                                                <div class="row px-2">
                                                    <div class="col-6 d-flex justify-content-center flex-column sub_content align-content-center">
                                                        <div class="single_detail">
                                                            <label for="" class="text-muted">Year</label>
                                                            <p><?php echo $vehicle['year_of_prod']  ?></p>
                                                        </div>
                                                        <div class="single_detail">
                                                            <label for="" class="text-muted">Date Added</label>
                                                            <p><?php
                                                                if (isset($_SESSION['logged_in'])) {
                                                                    echo $vehicle['v_date_added'];
                                                                } else {
                                                                    echo "*****";
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-center flex-column sub_content align-content-center">
                                                        <div class="single_detail">
                                                            <label for="" class="text-muted">Location</label>
                                                            <p>lubicike</p>
                                                        </div>
                                                        <div class="single_detail">
                                                            <label for="" class="text-muted">Username</label>
                                                            <p>
                                                                <?php
                                                                if (isset($_SESSION['logged_in'])) {
                                                                    echo $vehicle['username'];
                                                                } else {
                                                                    echo "*****";
                                                                }

                                                                ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php  }
                        } ?>

                    </div>


                </div>
                <div class="col-lg-1 col-md-12">
                <?php  
                    $selectAdvertizement = "SELECT status FROM advertisement WHERE id=1";
                    $res = mysqli_query($conn, $selectAdvertizement);
                    $status = mysqli_fetch_assoc($res);
                    if($status['status']==1){
                    ?>
                    <div class="add_box2">
                        <p class="add">Advertising space on off by the administrator</p>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </section>



    <br>
    <br>
    <br>



    <?php include './inc/footer.php' ?>

</body>

</html>