<?php
require("./config/conn.php");
if (isset($_GET['vId'])) {
    $vehicleId = $_GET['vId'];
    $selectVehicle = "SELECT * FROM vehicles WHERE v_id = $vehicleId";
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
        <?php include("./inc/header.php")  ?>

        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/gallery.css">

        <title>Home</title>
    </head>

    <body style="background-color: #000;">

        <div class="row_top_gallery">
            <div class="row  pt-3">
                <div class="col-6 col-md-4  d-flex justify-content-center align-items-center">
                    <span>Dodge Charter, 2016</span>
                </div>
                <div class="col-3 col-md-4 text-lg-end"><small>1/5</small></div>
                <div class="col-3 col-md-4  px-4 px-sm-4 text-end">
                    <ion-icon style="font-size: 25px;font-weight:900; cursor: pointer;" name="close"></ion-icon>
                </div>
            </div>
        </div>
        <section class="main vehicle_details d-flex justify-content-center align-items-center">
            <div class="container-fluid container-gallery ">
                <div class="row position-relative d-flex justify-content-center ">
                    <div class="col-lg-1 col-md-12">
                    <?php  
                              $selectAdvertizement = "SELECT status FROM advertisement WHERE id=3";
                              $res = mysqli_query($conn, $selectAdvertizement);
                              $status = mysqli_fetch_assoc($res);
                              if($status['status']==1){
                              ?>
                        ?>
                        <div class="add_box">
                            <p class="add">Advertising space on off by the administrator</p>
                        </div>
                        <?php  } ?>
                    </div>
                    <div class="col-lg-9 col-md-12 p-0">


                        <section class="banner-section">
                            <div class="container_gallery">
                                <div class="vehicle-detail-banner banner-content clearfix">
                                    <div class="banner-slider">
                                        <div class="slider slider-for">

                                            <?php
                                            foreach ($previewImages as $image) {
                                                $img = explode("-", $image);
                                                $ext = ["jpg", "png", "gif", "jpeg"];
                                                $caption = explode(".", $img[1], -1);

                                            ?>
                                                <div class="slider-banner-image">
                                                    <img src="./user/uploads/<?php echo $image  ?>" alt="Car-Image">
                                                    <?php
                                                    if ($data['preview_caption_status'] == 1) {
                                                    ?>
                                                        <div class="caption" style="position:absolute;bottom:0;left:0;width:100%;padding:10px 5px; background-color: #4481eb;color:#fff;">
                                                            <?php echo $caption[0]  ?>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                            <?php  } ?>
                                        </div>


                                        <div class="slider slider-nav thumb-image">
                                            <?php
                                            foreach ($previewImages as $image) {
                                            ?>
                                                <div class="thumbnail-image" style="z-index:-1">
                                                    <div class="thumbImg">
                                                        <img src="./user/uploads/<?php echo $image  ?>" alt="slider-img">

                                                    </div>
                                                </div>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End User this HTML for Slider -->

                    </div>
                    <div class="col-lg-1 col-md-12">
                    <?php  
                              $selectAdvertizement = "SELECT status FROM advertisement WHERE id=3";
                              $res = mysqli_query($conn, $selectAdvertizement);
                              $status = mysqli_fetch_assoc($res);
                              if($status['status']==1){
                              ?>
                        ?>
                        <div class="add_box2">
                            <p class="add">Advertising space on off by the administrator</p>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </section>


        <?php include("./inc/footer.php") ?>

        <script>
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
                        breakpoint: 1200,
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