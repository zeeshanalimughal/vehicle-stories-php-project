<?php
include('../config/conn.php');
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
if (isset($_GET['vId'])) {
    $id = $_GET['vId'];
    $selectQuery = "SELECT * FROM vehicles WHERE v_id = $id";
    $resSelect = mysqli_query($conn, $selectQuery);
    $vehicle = mysqli_fetch_assoc($resSelect);

?>

    <!doctype html>
    <html lang="en">

    <head>
        <?php
     
        include('./inc/header.php');
        include("../utils/getCountrysList.php");
        include("../utils/generateMessage.php");

        $v_type = $v_brand = $v_model = $v_year_of_produc = $v_capacity = $v_power = $v_fuel_type = $v_transmission = $v_drive = $v_max_speed = $v_doors = $v_seats = $v_mileage = $v_origin_country = $v_est_value = $v_current_owner_purch_date = $v_district = $v_location_voivodship = $v_description = $v_history = $v_shows_events = $v_repairs_exploitation = $v_pleasant_events = $v_advantages =  $v_problems = $v_announcement_buy_cell = $v_main_picture = $v_image_caption = "";

        if (isset($_POST['submit'])) {
            $v_type = mysqli_real_escape_string($conn, $_POST['v_type']);
            $v_brand = mysqli_real_escape_string($conn, $_POST['v_brand']);
            $v_model = mysqli_real_escape_string($conn, $_POST['v_model']);
            $v_year_of_produc = mysqli_real_escape_string($conn, $_POST['v_year_of_produc']);
            $v_capacity = mysqli_real_escape_string($conn, $_POST['v_capacity']);
            $v_power = mysqli_real_escape_string($conn, $_POST['v_power']);
            $v_fuel_type = mysqli_real_escape_string($conn, $_POST['v_fuel_type']);
            $v_transmission = mysqli_real_escape_string($conn, $_POST['v_transmission']);
            $v_drive = mysqli_real_escape_string($conn, $_POST['v_drive']);
            $v_max_speed = mysqli_real_escape_string($conn, $_POST['v_max_speed']);
            $v_doors = mysqli_real_escape_string($conn, $_POST['v_doors']);
            $v_seats = mysqli_real_escape_string($conn, $_POST['v_seats']);
            $v_mileage = mysqli_real_escape_string($conn, $_POST['v_mileage']);
            $v_origin_country = mysqli_real_escape_string($conn, $_POST['v_origin_country']);
            $v_est_value = mysqli_real_escape_string($conn, $_POST['v_est_value']);
            $v_current_owner_purch_date = mysqli_real_escape_string($conn, $_POST['v_current_owner_purch_date']);
            $v_district = mysqli_real_escape_string($conn, $_POST['v_district']);
            $v_location_voivodship = mysqli_real_escape_string($conn, $_POST['v_location_voivodship']);
            $v_description = mysqli_real_escape_string($conn, $_POST['v_description']);
            $v_history = mysqli_real_escape_string($conn, $_POST['v_history']);
            $v_shows_events = mysqli_real_escape_string($conn, $_POST['v_shows_events']);
            $v_repairs_exploitation = mysqli_real_escape_string($conn, $_POST['v_repairs_exploitation']);
            $v_pleasant_events = mysqli_real_escape_string($conn, $_POST['v_pleasant_events']);
            $v_advantages = mysqli_real_escape_string($conn, $_POST['v_advantages']);
            $v_problems = mysqli_real_escape_string($conn, $_POST['v_problems']);
            $v_announcement_buy_cell = mysqli_real_escape_string($conn, $_POST['v_announcement_buy_cell']);



            $sql_update = "UPDATE `vehicles` SET 
                   `type`='$v_type',
                   `brand`='$v_brand',
                   `model`='$v_model',
                   `year_of_prod`='$v_year_of_produc',
                   `capacity`='$v_capacity',
                   `power`='$v_power',
                   `fuel_type`='$v_fuel_type',
                   `transmission`='$v_transmission',
                   `drive`='$v_drive',
                  `v_max_speed`='$v_max_speed',
                   `doors`='$v_doors',
                   `seats`='$v_seats',
                   `mileage`='$v_mileage',
                   `origin_country`='$v_origin_country',
                   `est_value`='$v_est_value',
                   `current_owner_purch_date`='$v_current_owner_purch_date',
                   `location`='$v_location_voivodship',
                   `district`='$v_district',
                   `vehicle_desc`='$v_description',
                   `vehicle_history`='$v_history',
                   `vehicle_shows_events`='$v_shows_events',
                   `vehicle_repairs_exploitation`='$v_repairs_exploitation',
                   `vehicle_pleasant_events`='$v_pleasant_events',
                   `vehicle_advantages`='$v_advantages',
                   `vehicle_problems`='$v_problems',
                  `v_announcement_buy_cell`='$v_announcement_buy_cell'
                   WHERE v_id = $id;";

            $res = mysqli_query($conn, $sql_update) or die("Error: " . mysqli_error($conn));
            if ($res) {
                $_SESSION['message-updated'] = generateMessage("Vehicle Updated Successfully", "success");
                header("Location:dashboard.php");
            } else {
                $_SESSION['message-updated'] = generateMessage("Something went wrong", "danger");
                header("Location:dashboard.php");

            }
        } else {
            $_SESSION['errors'] = array();
            foreach ($errors as $error) {
                array_push($_SESSION['errors'], $error);
            }
        }

        ?>



        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <link href="../admin/assets/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css" rel="stylesheet">


        <!-- Year Picker CSS -->
        <link rel="stylesheet" href="../admin/assets/yearpicker/yearpicker.css" />



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
                    <h4 class="mb-0 text-uppercase">Vehicles Edit</h4>
                    <hr />

                    <div class="row">
                        <div class="col-8">
                            <span>
                                <?php if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </span>
                            <span>
                                <?php if (isset($_SESSION['errors'])) {
                                    foreach ($_SESSION['errors'] as $img_error) {
                                        echo $img_error;
                                    }
                                    unset($_SESSION['errors']);
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-car me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Vehicle Update</h5>
                            </div>
                            <hr>
                            <form name="form-example-1" id="form-example-1" class="row g-3" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Type of vehicle</label>
                                    <select name="v_type" id="v_type" class="form-select" required>
                                        <option value="<?php echo $vehicle['type'] ?>" selected><?php echo $vehicle['type'] ?></option>
                                        <option value="cars">cars</option>
                                        <option value="vans">vans</option>
                                        <option value="motorbikes">motorbikes</option>
                                        <option value="quads">quads</option>
                                        <option value="lorries">lorries</option>
                                        <option value="buses">buses</option>
                                        <option value="agricultural">agricultural</option>
                                        <option value="specials">specials</option>
                                        <option value="water">water</option>
                                        <option value="aerial">aerial</option>
                                        <option value="others">others</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Brand</label>
                                    <select name="v_brand" id="v_brand" class="form-select" required>
                                        <option selected value="<?php echo $vehicle['brand'] ?>"><?php echo $vehicle['brand'] ?></option>

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail" class="form-label">Model</label>
                                    <select name="v_model" id="v_model" class="form-select" required>
                                        <option value="<?php echo $vehicle['model'] ?>" selected><?php echo $vehicle['model'] ?></option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Year of production</label>
                                    <!-- <input type="date" id="produc_date_select" placeholder="DD-MM-YYYY" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" title="Enter a date in this formart DD-MM-YYYY" />
                                <input type="hidden" id="produc_date" name="v_year_of_produc" required> -->
                                    <!-- <input type="date" class="form-control" name="v_year_of_produc" /> -->
                                    <input type="text" name="v_year_of_produc" value="<?php echo $vehicle['year_of_prod'] ?>" class="form-control yearpicker" min="0" max="9999" onKeyPress="if(parseInt(this.value) > parseInt(new Date().getFullYear()))  this.value = ''">



                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Engine capacity in cm3</label>
                                    <input type="number" min="0" max="999999" onKeyPress="if(this.value.length==6) return false;" value="<?php echo $vehicle['capacity'] ?>" name="v_capacity" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Power in kW</label>
                                    <input type="number" min="0" max="99999" onKeyPress="if(this.value.length==5) return false;" name="v_power" value="<?php echo $vehicle['power'] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Fuel type</label>

                                    <select name="v_fuel_type" class="form-select" required>
                                        <option value="<?php echo $vehicle['fuel_type'] ?>" selected><?php echo $vehicle['fuel_type'] ?></option>
                                        <option>petrol</option>
                                        <option>diesel</option>
                                        <option>hybrid petrol</option>
                                        <option>hybrid diesel</option>
                                        <option>gasoline</option>
                                        <option>electric</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Transmission</label>

                                    <select name="v_transmission" class="form-select" required>
                                        <option value="<?php echo $vehicle['transmission'] ?>" selected><?php echo $vehicle['transmission'] ?></option>
                                        <option value="automatic">automatic</option>
                                        <option value="manual">manual</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Drive</label>

                                    <select name="v_drive" class="form-select">
                                        <option value="<?php echo $vehicle['drive'] ?>" selected><?php echo $vehicle['drive'] ?></option>
                                        <option>AWD/4WD</option>
                                        <option>Front Wheel Drive</option>
                                        <option>Rear Wheel Drive</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Max speed in km/h</label>
                                    <input type="number" name="v_max_speed" class="form-control" min="1" max="9999" value="<?php echo $vehicle['v_max_speed'] ?>" onKeyPress="if(this.value.length==4) return false;" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Number of doors</label>

                                    <select name="v_doors" class="form-select" required>
                                        <option value="<?php echo $vehicle['doors'] ?>" selected><?php echo $vehicle['doors'] ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6 and more">6 and more</option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Number of seats</label>

                                    <select name="v_seats" class="form-select" required>
                                        <option value="<?php echo $vehicle['seats'] ?>" select><?php echo $vehicle['seats'] ?></option>
                                        <?php
                                        for ($i = 1; $i <= 100; $i++)
                                            echo "<option value=\"$i\">$i</option>";
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mileage in km</label>
                                    <input type="number" min="0" max="9999999" value="<?php echo $vehicle['mileage'] ?>" onKeyPress="if(this.value.length==7) return false;" name="v_mileage" class="form-control" required>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Country of origin</label>
                                    <select name="v_origin_country" id="" class="form-select">
                                        <option value="<?php echo $vehicle['origin_country'] ?>" disabled><?php echo $vehicle['origin_country'] ?></option>
                                        <?php
                                        foreach (getCountries() as $country) {
                                            echo $country;
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Estimated value in $</label>
                                    <input type="number" name="v_est_value" class="form-control" min="0" max="9999999" value="<?php echo $vehicle['est_value'] ?>" onKeyPress="if(this.value.length==7) return false;" required>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Current owner purchase date</label>

                                    <input type="text" name="v_current_owner_purch_date" class="form-control yearpicker2">

                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location - voivodship</label>
                                    <select name="v_location_voivodship" id="v_location_voivodship" class="form-select">
                                        <option value="<?php echo $vehicle['location'] ?>" selected><?php echo $vehicle['location'] ?></option>
                                        <option value="dolnośląskie">dolnośląskie</option>
                                        <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                                        <option value="lubelskie">lubelskie</option>
                                        <option value="lubuskie">lubuskie</option>
                                        <option value="łódzkie">łódzkie</option>
                                        <option value="małopolskie">małopolskie</option>
                                        <option value="mazowieckie">mazowieckie</option>
                                        <option value="opolskie">opolskie</option>
                                        <option value="podkarpackie">podkarpackie</option>
                                        <option value="podlaskie">podlaskie</option>
                                        <option value="pomorskie">pomorskie</option>
                                        <option value="śląskie">śląskie</option>
                                        <option value="świętokrzyskie">świętokrzyskie</option>
                                        <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                                        <option value="wielkopolskie">wielkopolskie</option>
                                        <option value="zachodnio-pomorskie">zachodnio-pomorskie</option>
                                    </select>
                                </div>



                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <select class="form-select" name="v_district" id="v_district">
                                        <option value="<?php echo $vehicle['district'] ?>" selected><?php echo $vehicle['district'] ?></option>

                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Description of vehicle characteristics</label>
                                    <textarea style="resize: none;" id="inputVehicleDescription" class="form-control" id="inputAddress" name="v_description" rows="3" required><?php echo $vehicle['vehicle_desc'] ?></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">History and origin of the vehicle</label>
                                    <textarea style="resize: none;" class="form-control" id="inputAddress" name="v_history" rows="3" required><?php echo $vehicle['vehicle_history'] ?></textarea>
                                </div>



                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Shows, events, rallies, races the vehicle has taken part in</label>
                                    <textarea style="resize: none;" class="form-control" name="v_shows_events" id="inputAddress" rows="3" required><?php echo $vehicle['vehicle_shows_events'] ?></textarea>
                                </div>




                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Everyday life, use and exploitation of the vehicle, repairs</label>
                                    <textarea style="resize: none;" class="form-control" name="v_repairs_exploitation" id="inputAddress" rows="3" required><?php echo $vehicle['vehicle_repairs_exploitation'] ?></textarea>
                                </div>





                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Interesting or pleasant events linked to the vehicle</label>
                                    <textarea style="resize: none;" class="form-control" name="v_pleasant_events" id="inputAddress" rows="3" required><?php echo $vehicle['vehicle_pleasant_events'] ?></textarea>
                                </div>







                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">The advantages of the vehicle</label>
                                    <textarea style="resize: none;" class="form-control" name="v_advantages" id="inputAddress" rows="3" required><?php echo $vehicle['vehicle_advantages'] ?></textarea>
                                </div>





                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Problems with the vehicle, repairs, maintenance</label>
                                    <textarea style="resize: none;" class="form-control" name="v_problems" id="inputAddress" rows="3"><?php echo $vehicle['vehicle_problems'] ?></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Announcement - buy, sell, trade, give away</label>
                                    <textarea style="resize: none;" class="form-control" name="v_announcement_buy_cell" id="inputAddress" rows="3" required><?php echo $vehicle['v_announcement_buy_cell'] ?></textarea>
                                </div>


                                <div class="col-12">
                                    <input type="submit" value="Update" name="submit" class="btn btn-primary px-5" />
                                </div>
                            </form>
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

            <script type="text/javascript" src="../admin/assets/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js"></script>

            <!-- Moment Js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

            <!-- Year Picker Js -->
            <script src="../admin/assets/yearpicker/yearpicker.js"></script>

            <script src="../js/selects.js"></script>

            <script>
                // $('#produc_date_select').change(function() {
                //     $('#produc_date').attr('value', this.value.split("-").reverse().join("-"))
                // });




                $(document).ready(function() {
                    $('.yearpicker').yearpicker({
                        // Auto Hide
                        autoHide: true,

                        // Initial Year
                        year: `<?php echo $vehicle['year_of_prod'] ?>`,

                        // Start Year
                        startYear: null,

                        // End Year
                        endYear: null,

                        // Element tag
                        itemTag: 'li',

                        // Default CSS classes
                        selectedClass: 'selected',
                        disabledClass: 'disabled',
                        hideClass: 'hide',
                        highlightedClass: 'highlighted',

                        // Custom template
                        template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>`
                    });


                    $('.yearpicker2').yearpicker({
                        // Auto Hide
                        autoHide: true,

                        // Initial Year
                        year: `<?php echo $vehicle['current_owner_purch_date'] ?>`,

                        // Start Year
                        startYear: null,

                        // End Year
                        endYear: null,

                        // Element tag
                        itemTag: 'li',

                        // Default CSS classes
                        selectedClass: 'selected',
                        disabledClass: 'disabled',
                        hideClass: 'hide',
                        highlightedClass: 'highlighted',

                        // Custom template
                        template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>`
                    });
                });
            </script>
    </body>

    </html>

<?php  } else {
    header("Location:../logout.php");
} ?>