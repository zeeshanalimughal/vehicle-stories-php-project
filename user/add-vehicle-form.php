<!doctype html>
<html lang="en">

<head>
    <?php include('../config/conn.php');
    if (!isset($_SESSION['logged_in'])) {
        header('Location:../login.php');
    }
    include('./inc/header.php');
    include("../utils/getCountrysList.php");
    include("../utils/generateMessage.php");

    $v_type = $v_brand = $v_model = $v_year_of_produc = $v_capacity = $v_power = $v_fuel_type = $v_transmission = $v_drive = $v_max_speed = $v_doors = $v_seats = $v_mileage = $v_origin_country = $v_est_value = $v_current_owner_purch_date = $v_district = $v_location_voivodship = $v_description = $v_history = $v_shows_events = $v_repairs_exploitation = $v_pleasant_events = $v_advantages =  $v_problems = $v_announcement_buy_cell = $v_main_picture = $v_image_caption = "";
    $v_preview_picture = array();



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
        $v_image_caption = mysqli_real_escape_string($conn, $_POST['v_image_caption']);
        // $v_main_picture = mysqli_real_escape_string($conn, $_POST['v_main_picture']);


        // if(isset($_FILES['v_preview_picture'])){

        $j = 0; //Variable for indexing uploaded image 

        $target_path = "uploads/"; //Declaring Path for uploaded images
        for ($i = 0; $i < count($_FILES['v_preview_picture']['name']); $i++) { //loop to get individual element from the array

            $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
            $ext = explode('.', basename($_FILES['v_preview_picture']['name'][$i])); //explode file name from dot(.) 
            $file_extension = end($ext); //store extensions in the variable


            $j = $j + 1;

            if (($_FILES["v_preview_picture"]["size"][$i] < 800000) //Approx. 800kb files can be uploaded.
                && in_array($file_extension, $validextensions)
            ) {
                $new_name  =   time() . '' . rand(1000, 9999) . "-" . $_FILES['v_preview_picture']['name'][$i];
                array_push($v_preview_picture, $new_name);
                if (move_uploaded_file($_FILES['v_preview_picture']['tmp_name'][$i], $target_path . $new_name)) { //if file moved to uploads folder
                    $j .
                        ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                } else { //if file was not moved.
                    $j .
                        ').<span id="error">please try again!.</span><br/><br/>';
                }
            } else { //if file size and file type was incorrect.
                $j .
                    ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
            }
        }



        $preview_Images = implode(',', $v_preview_picture);




        if (isset($_FILES['v_main_picture'])) {
            $errors = array();
            $file_name = $_FILES['v_main_picture']['name'];
            $file_size = $_FILES['v_main_picture']['size'];
            $file_tmp = $_FILES['v_main_picture']['tmp_name'];
            $file_type = $_FILES['v_main_picture']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['v_main_picture']['name'])));

            $expensions = array("jpeg", "jpg", "png");
            // if (file_exists($file_name)) {
            //     echo "Sorry, file already exists.";
            // }
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = generateMessage("extension not allowed, please choose a JPEG or PNG file.", "danger");
            }

            if ($file_size > 800000) {
                // if ($file_size > 2097152) {
                $errors[] = generateMessage('File size must be excately 800kb', 'danger');
            }





            if (empty($errors) == true) {
                $nameOfImage  = time() . '' . rand(1000, 9999) . "-" . $file_name;
                $date = date('d-m-y h:i:s');


                $sql_insert = "INSERT INTO `vehicles`(`user_id`, `type`, `brand`, `model`, `year_of_prod`, `capacity`, `power`, `fuel_type`, `transmission`, `drive`,`v_max_speed`, `doors`, `seats`, `mileage`, `origin_country`, `est_value`, `current_owner_purch_date`,`v_date_added`, `location`, `district`, `vehicle_desc`, `vehicle_history`, `vehicle_shows_events`, `vehicle_repairs_exploitation`, `vehicle_pleasant_events`, `vehicle_advantages`, `vehicle_problems`,`v_announcement_buy_cell`, `v_image_caption`,`vehicle_main_picture`, `vehicle_preview_picture`) VALUES (
            
                    14,
                    '$v_type',
                    '$v_brand',
                    '$v_model',
                    '$v_year_of_produc',
                    '$v_capacity',
                    '$v_power',
                    '$v_fuel_type',
                    '$v_transmission',
                    '$v_drive',
                    '$v_max_speed',
                    '$v_doors',
                    '$v_seats',
                    '$v_mileage',
                    '$v_origin_country',
                    '$v_est_value',
                    '$v_current_owner_purch_date',
                    '$date',
                    '$v_location_voivodship',
                    '$v_district',
                    '$v_description',
                    '$v_history',
                    '$v_shows_events',
                    '$v_repairs_exploitation',
                    '$v_pleasant_events',
                    '$v_advantages',
                    '$v_problems',
                    '$v_announcement_buy_cell',
                    '$v_image_caption',
                    '$nameOfImage',
                    '$preview_Images'
                    )";






                if (move_uploaded_file($file_tmp, "uploads/" . $nameOfImage)) {

                    $res = mysqli_query($conn, $sql_insert) or die("Error: " . mysqli_error($conn));
                    if ($res) {
                        $_SESSION['message'] = generateMessage("Car Added Successfully", "success");
                    } else {
                        $_SESSION['message'] = generateMessage("Something went wrong", "danger");
                    }
                } else {
                    $_SESSION['message'] = generateMessage("Something went wrong", "danger");
                }
            } else {
                $_SESSION['errors'] = array();
                foreach ($errors as $error) {
                    array_push($_SESSION['errors'], $error);
                }
            }
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
                <h4 class="mb-0 text-uppercase">Vehicles Submitions Form</h4>
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
                            <h5 class="mb-0 text-primary">Vehicle Registration</h5>
                        </div>
                        <hr>
                        <form name="form-example-1" id="form-example-1" class="row g-3" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Type of vehicle</label>
                                <select name="v_type" id="v_type" class="form-select">
                                    <option value="Select vehicle type" disabled selected>Select vehicle type</option>
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
                                <select name="v_brand" id="v_brand" class="form-select">
                                    <option disabled selected>Select vehicle brand</option>

                                </select>
                            </div>
                            <div class="col-md-12" id="v_other_brand_container" style="display:none">
                                <div class="row d-flex align-items-center">
                                    <div class="col-10">
                                        <input type="text" id="v_other_brand_value" onKeyPress="if(this.value.length==25) return false;" name="v_brand_other" class="form-control" placeholder="Add another brand">
                                    </div>
                                    <div class="col-2">
                                        <a class="btn btn-primary" id="add_other_brand" >Add</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Model</label>
                                <select name="v_model" id="v_model" class="form-select">
                                    <option value="Select vehicle modal" disabled selected>Select vehicle modal</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Year of production</label>
                                <!-- <input type="date" id="produc_date_select" placeholder="DD-MM-YYYY"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" title="Enter a date in this formart DD-MM-YYYY" />
                                <input type="hidden" id="produc_date" name="v_year_of_produc" > -->
                                <!-- <input type="date" class="form-control" name="v_year_of_produc" /> -->
                                <input type="number" name="v_year_of_produc" class="form-control yearpicker" min="0" max="9999" onKeyPress="if(parseInt(this.value) > parseInt(new Date().getFullYear()))  this.value = ''" value="">



                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Engine capacity in cm3</label>
                                <input type="number" min="0" max="999999" onKeyPress="if(this.value.length==6) return false;" name="v_capacity" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Power in kW</label>
                                <input type="number" min="0" max="99999" onKeyPress="if(this.value.length==5) return false;" name="v_power" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fuel type</label>

                                <select name="v_fuel_type" class="form-select">
                                    <option disabled selected></option>
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

                                <select name="v_transmission" class="form-select">
                                    <option disabled selected></option>
                                    <option value="automatic">automatic</option>
                                    <option value="manual">manual</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Drive</label>

                                <select name="v_drive" class="form-select">
                                    <option disabled selected></option>
                                    <option>AWD/4WD</option>
                                    <option>Front Wheel Drive</option>
                                    <option>Rear Wheel Drive</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Max speed in km/h</label>
                                <input type="number" name="v_max_speed" class="form-control" min="1" max="9999" onKeyPress="if(this.value.length==4) return false;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Number of doors</label>

                                <select name="v_doors" class="form-select">
                                    <option disabled selected></option>
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

                                <select name="v_seats" class="form-select">
                                    <option disabled select></option>
                                    <?php
                                    for ($i = 1; $i <= 100; $i++)
                                        echo "<option value=\"$i\">$i</option>";
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mileage in km</label>
                                <input type="number" min="0" max="9999999" onKeyPress="if(this.value.length==7) return false;" name="v_mileage" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Country of origin</label>
                                <select name="v_origin_country" id="" class="form-select">
                                    <option value="" disabled>Select country of origin</option>
                                    <?php
                                    foreach (getCountries() as $country) {
                                        echo $country;
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Estimated value in $</label>
                                <input type="number" name="v_est_value" class="form-control" min="0" max="9999999" onKeyPress="if(this.value.length==7) return false;">
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Current owner purchase date</label>

                                <input type="text" name="v_current_owner_purch_date" class="form-control yearpicker" value="">

                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location - voivodship</label>
                                <select name="v_location_voivodship" id="v_location_voivodship" class="form-select">
                                    <option disabled selected></option>
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
                                    <option disabled selected></option>

                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Description of vehicle characteristics</label>
                                <textarea style="resize: none;" id="inputVehicleDescription" class="form-control" id="inputAddress" name="v_description" rows="3"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">History and origin of the vehicle</label>
                                <textarea style="resize: none;" class="form-control" id="inputAddress" name="v_history" rows="3"></textarea>
                            </div>



                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Shows, events, rallies, races the vehicle has taken part in</label>
                                <textarea style="resize: none;" class="form-control" name="v_shows_events" id="inputAddress" rows="3"></textarea>
                            </div>




                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Everyday life, use and exploitation of the vehicle, repairs</label>
                                <textarea style="resize: none;" class="form-control" name="v_repairs_exploitation" id="inputAddress" rows="3"></textarea>
                            </div>





                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Interesting or pleasant events linked to the vehicle</label>
                                <textarea style="resize: none;" class="form-control" name="v_pleasant_events" id="inputAddress" rows="3"></textarea>
                            </div>







                            <div class="col-12">
                                <label for="inputAddress" class="form-label">The advantages of the vehicle</label>
                                <textarea style="resize: none;" class="form-control" name="v_advantages" id="inputAddress" rows="3"></textarea>
                            </div>





                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Problems with the vehicle, repairs, maintenance</label>
                                <textarea style="resize: none;" class="form-control" name="v_problems" id="inputAddress" rows="3"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Announcement - buy, sell, trade, give away</label>
                                <textarea style="resize: none;" class="form-control" name="v_announcement_buy_cell" id="inputAddress" rows="3"></textarea>
                            </div>




                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Add a main vehicle picture with preview</label>
                                <input type="file" name="v_main_picture" id="main_picture" class="form-control" onchange="previewFile(this);" accept="image/*" required>
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">Add captions to photos</label>
                                <input type="text" name="v_image_caption" class="form-control" required>
                            </div>


                            <div class="col-12">
                                <img id="previewImg" style="width:600px; height:450px; object-fit: contain; display:none" src="" alt="">

                            </div>






                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Add other vehicle photos for preview</label>
                                <!-- <input type="file" name="v_preview_picture[]" class="form-control"  multiple accept="image/*"> -->
                                <div class="input-images-1" style="padding-top: .5rem;" required></div>



                            </div>

                            <!-- <div class="col-12">

                                <div class="input-field">
                                    <label class="active">Photos</label>
                                </div>
                            </div> -->

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">I declare that the published information does not violate the welfare of other persons. If images of people
                                        are included in the photos. I declare that I have received their permission for publication</label>
                                </div>
                            </div>
                            <!-- 
									<div class="col-12">
										<label for="inputAddress2" class="form-label">Address 2</label>
										<textarea class="form-control" id="inputAddress2" placeholder="Address 2..." rows="3"></textarea>
									</div
									<div class="col-md-6">
										<label for="inputCity" class="form-label">City</label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-4">
										<label for="inputState" class="form-label">State</label>
										<select id="inputState" class="form-select">
											<option selected="">Choose...</option>
											<option>...</option>
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputZip" class="form-label">Zip</label>
										<input type="text" class="form-control" id="inputZip">
									</div> -->

                            <div class="col-12">
                                <input type="submit" name="submit" class="btn btn-primary px-5" />
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
            function previewFile(input) {
                var file = $("#main_picture").get(0).files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function() {
                        $("#previewImg").css("display", "block");
                        $("#previewImg").attr("src", reader.result);
                    }

                    reader.readAsDataURL(file);
                }
            }

            $('.input-images-1').imageUploader({
                imagesInputName: 'v_preview_picture',
            });
            $('#produc_date_select').change(function() {
                $('#produc_date').attr('value', this.value.split("-").reverse().join("-"))
            });




            $(document).ready(function() {

                $('.yearpicker').yearpicker({
                    // Auto Hide
                    autoHide: true,

                    // Initial Year
                    year: null,

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