<?php
require("../config/conn.php");
include("../utils/generateMessage.php");
include("../utils/recaptcha.php");
if (isset($_SESSION['varified'])) {
    if (isset($_POST['reset-password'])) {
        $new_email = trim($_POST['new-email']);
        if (!empty($new_email)) {
            $reset_key = bin2hex(random_bytes(40));
            $_SESSION['reset_key'] = $reset_key;
            $updateEmail = "UPDATE admin SET email = '$new_email' WHERE email = '{$_SESSION['email']}'";
            $resUpdate = mysqli_query($conn, $updateEmail);
            if ($resUpdate) {
                $_SESSION['message-email'] = generateMessage("Email address changed successfully", "success");
                unset($_SESSION['varified']);
                unset($_SESSION['email']);
                header("Location:index.php");
            } else {
                $_SESSION['message-email'] = generateMessage("Something went wrong", "warning");
                header("Location:index.php");
            }
        }
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <?php include './inc/header.php'  ?>

        <title>Rukada - Responsive Bootstrap 5 Admin Template</title>
    </head>

    <body>
        <!--wrapper-->
        <div class="wrapper p-0 m-0 d-flex justify-content-center align-items-center">
            <!--start page wrapper -->
            <div class="page-wrapper p-0 m-0 d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="page-content p-0 m-0 d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="container d-flex justify-content-center align-items-center p-0 m-0">
                        <div class="card border-top border-0 border-4 border-dark" style="max-width: 450px;width: 100%;">
                            <div class="card-body p-3">
                                <div class="card-title text-center">
                                    <!-- <i class="bx bxs-user-circle text-dark font-50"></i> -->
                                    <h5 class="mb-3 mt-2 text-dark">Change Email</h5>
                                </div>
                                <span id="mess"></span>
                                <span>
                                    <?php if (isset($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    }
                                    ?>
                                </span>
                                <hr>
                                <form id="form" class="row g-2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

                                    <div class="col-12">
                                        <label for="inputLastEnterUsername" class="form-label">Enter New Email</label>
                                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                            <input type="email" name="new-email" id="new_email" class="form-control border-start-0" placeholder="new email address">
                                        </div>
                                    </div>

                                    <div class="col-12 my-3">
                                        <div class="d-grid">
                                            <button type="submit" id="reset-email" name="reset-password" class="btn btn-dark btn-lg px-5"><i class="bx bxs-lock-open"></i>Reset Email</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--end wrapper-->


        <?php include("./inc/footer.php")  ?>

        <script>
            const form = document.getElementById('form'),
                new_email = document.getElementById('new_email'),
                reset_email_submit = document.getElementById('reset-email'),
                mess = document.getElementById('mess');


            function ValidateEmail(email) {
                var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (email.match(validRegex)) {
                    return true;
                } else {
                    return false;
                }
            }
            reset_email_submit.addEventListener('click', function(e) {
                if (new_email.value.length == 0) {
                    e.preventDefault();
                    mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">Please enter your new email address</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                } else {
                    if (ValidateEmail(new_email.value) == false) {
                        e.preventDefault();
                        mess.innerHTML = `<div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                            <div class="text-white">Please enter a valid new email address</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    } else {
                        form.submit();
                    }
                }
            })
        </script>
    </body>

    </html>
<?php  } else {
    $_SESSION['message'] = generateMessage("Validation Failed", "warning");
    header("Location:index.php");
} ?>