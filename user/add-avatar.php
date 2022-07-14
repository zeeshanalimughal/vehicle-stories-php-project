<?php
include('../config/conn.php');
if (!isset($_SESSION['logged_in'])) {
    header('Location:../login.php');
}
include('../utils/generateMessage.php');
if(isset($_POST['upload'])){
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


            if (move_uploaded_file($file_tmp, "uploads/" . $nameOfImage)) {

                $queryUpdate = "UPDATE users SET avatar = '$nameOfImage' WHERE username = '{$_SESSION['logged_in']}'";
                $res = mysqli_query($conn, $queryUpdate) or die("Error: " . mysqli_error($conn));
                if ($res) {
                    $_SESSION['message'] = generateMessage("Avatar Updated Successfully", "success");
                    header("Location:index.php");
                } else {
                    $_SESSION['message'] = generateMessage("Something went wrong", "danger");
                    header("Location:index.php");

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
        <?php include("./inc/nav.php")  ?>

        <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">


                <h4 class="mb-0 text-uppercase">Upload Profile Picture</h4>
                <hr />
                <div class="row">
                    <div class="col-8">
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
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-sm-12 mb-5 d-flex justify-content-center flex-column">
                            <div class="mb-3 py-3 w-100">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="main_picture" name="v_main_picture" onchange="previewFile(this);" accept="image/*" required>
                            </div>
                            <button class="btn d-block btn-success" name="upload" type="submit">Upload</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 ps-0 ps-sm-4 d-flex justify-content-center">
                            <div class="card shadow-none card__profile__image" style="width:400px;height:300px;background:transparent;">
                                <img style="display:none;" src="assets/images/gallery/16.png" id="previewImg" class="card-img-top">
                            </div>
                        </div>
                    </div>

                </form>
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
        </script>
</body>

</html>