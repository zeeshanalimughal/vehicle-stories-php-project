<?php
require("./config/conn.php");
require("./utils/generateMessage.php");
if (isset($_GET['vId'])) {
    $vehicleId = $_GET['vId'];
    $selectVehicle = "SELECT * FROM vehicles INNER JOIN users ON users.id = vehicles.user_id WHERE v_id = $vehicleId";
    $res = mysqli_query($conn, $selectVehicle);

    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $previewImages = explode(",", $data['vehicle_preview_picture']);
    } else {
        header("Location:logout.php");
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include('./inc/header.php') ?>
        <link rel="stylesheet" href="./css/detailsGallery.css">

        <title>Home</title>
    </head>

    <body>

        <!-- Sticky Nav For Vehicle Details page -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 px-sm-5 sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./img/vs1.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sort</a>
                        </li>
                        <?php
                        if (isset($_SESSION['logged_in'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Only show vehicles with announcement</a>
                            </li>
                        <?php  } ?>

                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none text-muted" href="contact-us.php" tabindex="-1">Contact</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['logged_in'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-decoration-none text-muted" href="login.php" tabindex="-1">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-decoration-none text-muted" href="login.php" tabindex="-1">Register</a>
                            </li>
                        <?php } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-decoration-none text-muted" href="<?php
                                                                                            echo $BASE_URL_NAME ?>/user/index.php" tabindex="-1"><?php echo $_SESSION['logged_in']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php  }  ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-decoration-none text-muted " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Others
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">News</a></li>
                                <li><a class="dropdown-item" href="#">Rules</a></li>
                                <li><a class="dropdown-item" href="#">Rodo</a></li>
                                <li><a class="dropdown-item" href="#">Cookie consent</a></li>
                                <li><a class="dropdown-item" href="#">About</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="main vehicle_details">
            <div class="container-fluid">
                <div class="row position-relative d-flex justify-content-between">
                    <div class="col-lg-1 col-md-12">
                        <?php
                        $selectAdvertizement = "SELECT status FROM advertisement WHERE id=2";
                        $res = mysqli_query($conn, $selectAdvertizement);
                        $status = mysqli_fetch_assoc($res);
                        if ($status['status'] == 1) {
                        ?>

                            <div class="add_box">
                                <p class="add">Advertising space on off by the administrator</p>
                            </div>
                        <?php  } ?>
                    </div>
                    <div class="col-lg-9 col-md-12  p-0 ">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="car_details_container">
                                    <div class="row d-flex justify-content-center">
                                        <a href="home.php" class="back">
                                            <ion-icon name="arrow-back-outline"></ion-icon> Back to results
                                        </a>
                                        <div class="col-12">
                                            <div class="container_gallery">
                                                <div class="vehicle-detail-banner banner-content clearfix">
                                                    <div class="banner-slider">
                                                        <div class="slider slider-for">
                                                            <?php
                                                            foreach ($previewImages as $image) {
                                                            ?>
                                                                <div class="slider-banner-image">
                                                                    <a href="gallery.php?vId=<?php echo $data['v_id'] ?>">
                                                                        <img src="./user/uploads/<?php echo $image  ?>" alt="Car-Image">
                                                                    </a>
                                                                </div>
                                                            <?php  } ?>
                                                        </div>
                                                        <div class="slider slider-nav thumb-image">
                                                            <?php
                                                            foreach ($previewImages as $image) {
                                                            ?>
                                                                <div class="thumbnail-image">
                                                                    <div class="thumbImg">
                                                                        <img src="./user/uploads/<?php echo $image  ?>" alt="slider-img">
                                                                    </div>
                                                                </div>
                                                            <?php  } ?>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-12 my-2 ">
                                            <div class="card_description ">

                                                <?php if (strval($data['vehicle_desc']) !== '') { ?>

                                                    <div class="dec_box">
                                                        <h4 class="desc_heading">
                                                            Description of vehicle characteristics, equipment and performance
                                                        </h4>
                                                        <p class="desc_details">
                                                            <span></span><?php echo $data['vehicle_desc']  ?>
                                                        </p>
                                                    </div>

                                                <?php }  ?>





                                                <?php if (strval($data['vehicle_history']) !== '') { ?>
                                                    <div class="dec_box">
                                                        <h4 class="desc_heading">
                                                            History and origion of vehicle
                                                        </h4>
                                                        <p class="desc_details">
                                                            <span></span>
                                                            <?php echo $data['vehicle_history']  ?>
                                                        </p>
                                                    </div>
                                                <?php }  ?>





                                                <?php if (strval($data['vehicle_repairs_exploitation']) !== '') { ?>
                                                    <div class="dec_box">
                                                        <h4 class="desc_heading">
                                                            Problems with the vehicle, repairs, maintenance
                                                        </h4>
                                                        <p class="desc_details">
                                                            <span></span>
                                                            <?php echo $data['vehicle_repairs_exploitation']  ?>
                                                        </p>
                                                    </div>
                                                <?php }  ?>




                                            </div>
                                        </div>


                                        <?php if (isset($_SESSION['logged_in'])) {

                                        ?>


                                            <?php if (strval($data['v_announcement_buy_cell']) !== '') { ?>
                                                <div class="col-12 my-1">
                                                    <div class="card_description des_hidden">
                                                        <div class="dec_box des_hidden">
                                                            <h4 class="desc_heading">
                                                                Announcement - buy, sell, trade, give away
                                                            </h4>
                                                            <p class="desc_details">
                                                                <span></span>
                                                                <?php echo $data['v_announcement_buy_cell']  ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }  ?>


                                            <?php
                                            if (isset($_POST['addComment'])) {
                                                $message = $_POST['comment'];
                                                date_default_timezone_set("Asia/Karachi");
                                                $date = date('d-m-y h:i:s');


                                                $selectUserId = "SELECT id from users WHERE username='{$_SESSION['logged_in']}'";
                                                $resId = mysqli_query($conn, $selectUserId);
                                                $idArr = mysqli_fetch_array($resId);
                                                $userID = (int)$idArr[0];
                                                $insertComment = "INSERT INTO `comments`(`senderId`, `vehicleId`,`comment`,`date`) VALUES ($userID,$vehicleId,'$message','$date')";
                                                $resComment = mysqli_query($conn, $insertComment);
                                                if ($resComment) {
                                                    $_SESSION['message'] = generateMessage("Thank you for your comment", "success");
                                                }
                                            }


                                            ?>

                                            <div class="col-12 my-1">
                                                <div class="card_description comment_section">
                                                    <div class="comment_box">
                                                        <span>

                                                            <?php
                                                            if (isset($_SESSION['message'])) {
                                                                echo $_SESSION['message'];
                                                                unset($_SESSION['message']);
                                                            }
                                                            ?>
                                                        </span>
                                                        <?php
                                                        $selectTotComm = "SELECT count(comment_id) from comments WHERE vehicleId=$vehicleId";
                                                        $resCount = mysqli_query($conn, $selectTotComm);
                                                        $getCount = mysqli_fetch_array($resCount);
                                                        $counts = (int)$getCount[0];

                                                        ?>
                                                        <div class="comment_count"><?php echo $counts; ?> comments <span>
                                                                <ion-icon name="add" id="open_form"></ion-icon>
                                                            </span></div>

                                                        <form id="formComment" style="display: none;" method="POST" class="w-100 mt-2">
                                                            <div class="form-group w-100">
                                                                <textarea name="comment" id="" cols="30" rows="3" class="w-100 form-control" placeholder="Write your comment" required></textarea>
                                                                <button class="btn btn-primary" type="submit" id="addComment" name="addComment">Submit</button>
                                                            </div>
                                                        </form>

                                                        <?php
                                                        $selectCommQuery = "SELECT * FROM `comments` INNER JOIN users on users.id = comments.senderId ORDER BY comments.comment_id DESC;
                                                        ";
                                                        $resComments = mysqli_query($conn, $selectCommQuery);
                                                        if (mysqli_num_rows($res) > 0) {
                                                            while ($row = mysqli_fetch_assoc($resComments)) {

                                                        ?>
                                                                <div class="comment_single">
                                                                    <div class="comment_by">
                                                                        <ion-icon name="person-circle"></ion-icon> <?php echo $row['username'] . ', ' . $row['date'];  ?>
                                                                    </div>
                                                                    <div class="comment">
                                                                        <?php echo $row['comment']; ?>
                                                                    </div>
                                                                </div>

                                                        <?php  }
                                                        } else {
                                                            echo "No comment";
                                                        }  ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 my-2 list_container">
                                <div class="list_box sticky-lg-top" style="top: 89px;   ">
                                    <h3 class="list_heading sticky-lg-top">Dog Charger</h3>
                                    <h6 class="year sticky-lg-top">2016</h6>
                                    <ul class="list_outer sticky-lg-top">


                                        <?php if (strval($data['capacity']) !== '') { ?>
                                            <li>
                                                <span>Engine capacity in cm<sup>3</sup></span>
                                                <span><?php echo $data['capacity']  ?></span>
                                            </li>
                                        <?php }  ?>

                                        <?php if (strval($data['power']) !== '') { ?>
                                            <li>
                                                <span>Engine power in KW</span>
                                                <span><?php echo $data['power']  ?></span>
                                            </li>
                                        <?php }  ?>


                                        <?php if (strval($data['fuel_type']) !== '') { ?>
                                            <li>
                                                <span>Fuel Type</span>
                                                <span><?php echo $data['fuel_type']  ?></span>
                                            </li>
                                        <?php }  ?>


                                        <?php if (strval($data['transmission']) !== '') { ?>
                                            <li>
                                                <span>Transmission</span>
                                                <span><?php echo $data['transmission']  ?></span>
                                            </li>
                                        <?php }  ?>


                                        <?php if (strval($data['drive']) !== '') { ?>
                                            <li>
                                                <span>Drive</span>
                                                <span><?php echo $data['drive']  ?></span>
                                            </li>
                                        <?php }  ?>




                                        <?php if (strval($data['v_max_speed']) !== '') { ?>
                                            <li>
                                                <span>Max Speed in km/h</span>
                                                <span><?php echo $data['v_max_speed']  ?></span>
                                            </li>
                                        <?php }  ?>




                                        <?php if (strval($data['doors']) !== '') { ?>
                                            <li>
                                                <span>Number of doors</span>
                                                <span><?php echo $data['doors']  ?></span>
                                            </li>
                                        <?php }  ?>




                                        <?php if (strval($data['seats']) !== '') { ?>
                                            <li>
                                                <span>Number of seats</span>
                                                <span><?php echo $data['seats']  ?></span>
                                            </li>
                                        <?php }  ?>





                                        <?php if (strval($data['mileage']) !== '') { ?>
                                            <li>
                                                <span>Mileage in km</span>
                                                <span><?php echo $data['mileage']  ?></span>
                                            </li>
                                        <?php }  ?>




                                        <?php if (strval($data['origin_country']) !== '') { ?>
                                            <li>
                                                <span>Country of origion</span>
                                                <span><?php echo $data['origin_country']  ?></span>
                                            </li>
                                        <?php }  ?>



                                        <?php if (strval($data['est_value']) !== '') { ?>
                                            <li>
                                                <span>Estimated value in $</span>
                                                <span><?php echo $data['est_value']  ?></span>
                                            </li>
                                        <?php }  ?>



                                        <?php if (isset($_SESSION['logged_in'])) {

                                        ?>


                                            <?php if (strval($data['current_owner_purch_date']) !== '') { ?>
                                                <li>
                                                    <span>Year of purchase by current owner</span>
                                                    <span><?php echo $data['current_owner_purch_date']  ?></span>
                                                </li>
                                            <?php }  ?>


                                            <?php if (strval($data['location']) !== '') { ?>
                                                <li>
                                                    <span>Parking place voivodship</span>
                                                    <span><?php echo $data['location']  ?></span>
                                                </li>
                                            <?php }  ?>


                                            <?php if (strval($data['district']) !== '') { ?>
                                                <li>
                                                    <span>Parking place - poviat</span>
                                                    <span><?php echo $data['district']  ?></span>
                                                </li>
                                            <?php }  ?>


                                            <?php if (strval($data['username']) !== '') { ?>
                                                <li>
                                                    <span>Author</span>
                                                    <span><?php echo $data['username']  ?></span>
                                                </li>
                                            <?php }  ?>



                                            <?php if (strval($data['v_date_added']) !== '') { ?>
                                                <li>
                                                    <span>Date added</span>
                                                    <span><?php echo $data['v_date_added']  ?></span>
                                                </li>
                                            <?php }  ?>


                                            <?php if (strval($data['v_date_added']) !== '') { ?>
                                                <li>
                                                    <span>Last modified</span>
                                                    <span><?php echo $data['v_date_added']  ?></span>
                                                </li>
                                            <?php }  ?>

                                        <?php  } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-12">
                        <?php
                        $selectAdvertizement = "SELECT status FROM advertisement WHERE id=2";
                        $res = mysqli_query($conn, $selectAdvertizement);
                        $status = mysqli_fetch_assoc($res);
                        if ($status['status'] == 1) {
                        ?>

                            <div class="add_box2">
                                <p class="add">Advertising space on off by the administrator</p>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </section>



        <br>
        <br>
        <br>



        <?php include './inc/footer.php' ?>



        <script>
            $("#open_form").on('click', function() {
                $("#formComment").css("display", "block");
            })
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                vertical: true,
                asNavFor: '.slider-for',
                dots: false,
                focusOnSelect: true,
                verticalSwiping: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            vertical: false,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            vertical: false,
                        }
                    },
                    {
                        breakpoint: 580,
                        settings: {
                            vertical: false,
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 380,
                        settings: {
                            vertical: false,
                            slidesToShow: 2,
                        }
                    }
                ]
            });
        </script>
    </body>

    </html>

<?php   } else {
    header("Location:index.php");
} ?>