<?php
require("../config/conn.php");
if(isset($_SESSION['admin'])){
    header("Location:dashboard.php");
}
include("../utils/generateMessage.php");
include("../utils/recaptcha.php");

if (isset($_POST['login'])) {

    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if (!$res['success']) {
        $_SESSION['message'] = generateMessage("recaptcha failed, Please varify that you are not a Robot ", "warning");
    } else {

    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password' AND status = 1";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['admin']=$email;
            header("Location:dashboard.php");
        } else {
            $_SESSION['message'] = generateMessage("Wrong Credientials", "danger");
        }
    } else {
        $_SESSION['message'] = generateMessage("Please enter username and password", "primary");
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
                            <div class="card-title text-center"><i class="bx bxs-user-circle text-dark font-50"></i>
                                <h5 class="mb-3 mt-2 text-dark">Admin Login</h5>
                            </div>
                            <span>
                                <?php if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </span>
                            <span>
                                <?php if (isset($_SESSION['message-email'])) {
                                    echo $_SESSION['message-email'];
                                    unset($_SESSION['message-email']);
                                }
                                ?>
                            </span>
                            <hr>
                            <form class="row g-2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="col-12">
                                    <label for="inputLastEnterUsername" class="form-label">Enter Username</label>
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input type="email" name="email" class="form-control border-start-0" id="inputLastEnterUsername" placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputLastEnterPassword" class="form-label">Enter Password</label>
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent" style="position: relative;">
                                            <i class="bx bxs-lock-open"></i></span>
                                        <i class="bx bxs-show toggle_password" style="font-size: 25px; position: absolute; left: 92%; margin-top: 6px; z-index:1000;cursor: pointer;"></i>

                                        <input type="password" name="password" class="form-control border-start-0" id="password" placeholder="Enter Password">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end"> <a href="change-email.php">Change email ?</a>
                                </div>
                                <div class="col-12">
                                    <div class="g-recaptcha brochure__form__captcha" data-sitekey="SECRET_KEY_HERE"></div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" name="login" class="btn btn-dark btn-lg px-5"><i class="bx bxs-lock-open"></i>Login</button>
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
        const password = document.getElementById('password'),
            toggle_password = document.querySelector(".toggle_password");

        toggle_password.addEventListener('click', function() {
            if (toggle_password.classList.contains("bxs-show")) {
                toggle_password.classList.remove("bxs-show");
                toggle_password.classList.add("bxs-hide");
            } else {
                toggle_password.classList.add("bxs-show");
                toggle_password.classList.remove("bxs-hide");
            }
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
            // }
        })
    </script>

</body>

</html>