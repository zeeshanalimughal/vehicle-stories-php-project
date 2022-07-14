<?php
require("./config/conn.php");
if(isset($_SESSION['logged_in'])){
    header('Location:index.php');
}
require("./utils/generateMessage.php");
include("./utils/recaptcha.php");
$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
$hostname = trim($exec); //remove any spaces before and after
$ip = gethostbyname($hostname); //resolves the hostname using local 

if (isset($_POST['register'])) {

    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if (!$res['success']) {
        $_SESSION['message'] = generateMessage("recaptcha failed, Please varify that you are not a Robot ", "warning");
    } else {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));
        if (!empty($username) && !empty($email) && !empty($password)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['message'] = generateMessage("$email is not a valid email address", "danger");
            } else {
                $checkUser = "SELECT email from users WHERE username = '$username'";
                $checkRes = mysqli_query($conn, $checkUser);
                if (mysqli_num_rows($checkRes) > 0) {
                    // echo "User already exists";
                    $_SESSION['message'] = generateMessage("User already exists with these credientials", "warning");
                } else {
                    $date = date('d-m-y h:i:s');
                    $reset_key = bin2hex(random_bytes(40));

                    $_SESSION['reset_key'] = $reset_key;
                    $insertUser = "INSERT INTO `users`( `username`, `email`, `password`,`status`,`tocken`,`avatar`,`date_of_reg`,`total_vehicles`,`last_login`,`ip_of_registration`,`ip_last_login`) VALUES (
                        '{$username}',
                        '$email',
                        '$password',
                        0,
                        '$reset_key',
                        '',
                        '$date',
                        0,
                        '',
                        '$ip',
                        ''
                        )";
                    $res = mysqli_query($conn, $insertUser);
                    if ($res) {

                        $to = $email;
                        $from = 'example@gmail.com';
                        $fromName = 'Vehicle Stories';
                        $subject = "Account Activation Email";
                        $htmlContent = '
                    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset</title>
            <style>
                *{margin: 0;padding: 0;box-sizing: border-box;}
                body{
                    display: flex;
                    justify-content: center;
                    font-family: sans-serif;
                }
                .box{
                    max-width: 450px;
                    width: 100%;
                    padding:2rem;
                    border-radius: 10px;
                    box-shadow: 5px 10px 30px rgba(0, 0, 0, 0.1);
                    background-color: #fff;
                }
                p{
                    color:rgb(90, 90, 90);
                    font-size:18px;
                    line-height: 1.7rem;
                }
                a{
                    text-decoration: none !important;
                    padding:10px 20px;
                    display: inline-block;
                    margin-top: 20px !important;
                    background-color: #4481eb;
                    border-radius: 5px;
                    color: #fff !important;
                    box-shadow: 3px 5px 20px rgba(0, 0, 0, 0.1);
                }
            </style>
        </head>
        <body>
            <div class="box">
                <p>Please click on th following button to activate your account.</p>
                <a href="http://localhost/Vehicle-Stories/validate-user-account.php?reset-link=' . $reset_key . '">Activate Now</a>
            </div>
        </body>
        </html>';
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= 'From:<' . $email . '>' . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'Cc: example@gmail.com' . "\r\n";
                        $headers .= 'Bcc: example@gmail.com' . "\r\n";

                        // Send email 
                        if (mail($to, $subject, $htmlContent, $headers)) {
                            $_SESSION['message'] = generateMessage("Registered Please Check Email to varify account", "success");
                        } else {
                            $_SESSION['message'] = generateMessage("Email sending failed", "warning");
                        }
                    } else {
                        $_SESSION['message'] = generateMessage("Registration Failed", "danger");
                    }
                }
            }
        } else {
            echo "<script>alert('Please enter all fields');</script>";
        }
    }
}



if (isset($_POST['login'])) {

    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if (!$res['success']) {
        $_SESSION['message'] = generateMessage("recaptcha failed, Please varify that you are not a Robot", "warning");
    } else {

        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));

        if (!empty($username) && !empty($password)) {
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {

                $date = date('d-m-y h:i:s');
                $updateUser = "UPDATE users set last_login = '{$date}', ip_last_login = '{$ip}' WHERE username = '$username' AND password = '$password'";
                $resUpdate = mysqli_query($conn, $updateUser);
                if($resUpdate){
                    $_SESSION['logged_in'] = $username;
                    header("Location:index.php");
                }else{
                    $_SESSION['message'] = generateMessage("Something went wrong while updating ip", "danger");
                    header("Location:index.php");
                }

            } else {
                $_SESSION['message'] = generateMessage("Wrong Credientials or Account is inactive", "danger");
            }
        } else {
            $_SESSION['message'] = generateMessage("Please enter username and password", "primary");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './inc/header.php' ?>
    <title>Sign in & Sign up Form</title>
</head>

<body>

    <?php include './inc/nav.php'  ?>
    <div class="container_box">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" class="sign-in-form" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <h2 class="title">Sign in</h2>


                    <?php if (isset($_SESSION['message-success'])) {
                        echo '  <span style="padding:10px 5px; text-align: center; background-color: #00C853;color: #fff; font-size:16px;border-radius: 8px; margin: 10px 0;">
                            ' . $_SESSION['message-success'] . '
                            </span>';
                        unset($_SESSION['message-success']);
                    } ?>

                    <span>
                        <?php if (isset($_SESSION['message-success-reset'])) {
                            echo $_SESSION['message-success-reset'];
                            unset($_SESSION['message-success-reset']);
                        }
                        ?>
                    </span>
                    <span>
                        <?php if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </span>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field input-password">
                        <i class='bx bxs-lock'></i>
                        <i class='toggle_password2 bx bx-show'></i>

                        <input type="password" id="login_password" name="password" placeholder="Password" />
                    </div>

                    <div class="input-remember">
                        <div class="g-recaptcha brochure__form__captcha" data-sitekey="SITE_KEY_HERE"></div>
                    </div>
                    <div class="input-remember">
                        <input type="checkbox" />
                        <span>Remember me</span>
                    </div>



                    <input type="submit" name="login" id="login" value="Login" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-google'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-linkedin-square'></i>
                        </a>
                    </div>
                </form>
                <form method="POST" id="register_form" class="sign-up-form" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <span style="z-index: 100;" id="mess">

                    </span>
                    <h2 class="title">Sign up</h2>

                    <span>
                        <?php if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </span>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type="text" id="username" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-envelope'></i>
                        <input type="email" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field input-password">
                        <i class='bx bxs-lock'></i>
                        <i class='toggle_password bx bx-show'></i>
                        <input type="password" id="password" name="password" placeholder="Password" />
                    </div>

                    <div class="input-remember">
                        <div class="g-recaptcha brochure__form__captcha" data-sitekey="SITE_KEY_HERE"></div>
                    </div>
                    <div class="input-remember">
                        <input type="checkbox" id="terms" />
                        <span>Please accept our <a href="#">terms and regulations</a></span>
                    </div>
                    <input type="submit" name="register" id="register" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-google'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-linkedin-square'></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, ex ratione. Aliquid!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>


    <?php include './inc/footer.php'  ?>



    <script>
        const register = document.getElementById('register'),
            terms = document.getElementById('terms')
        username = document.getElementById('username'),
            email = document.getElementById('email'),
            password = document.getElementById('password'),
            mess = document.getElementById('mess');

        const toggle_password = document.querySelector(".toggle_password");
        const toggle_password2 = document.querySelector(".toggle_password2");
        const login_password = document.querySelector("#login_password");


        toggle_password.addEventListener('click', function() {
            if (toggle_password.classList.contains("bx-show")) {
                toggle_password.classList.remove("bx-show");
                toggle_password.classList.add("bx-hide");
            } else {
                toggle_password.classList.add("bx-show");
                toggle_password.classList.remove("bx-hide");
            }
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
            // }
        })
        toggle_password2.addEventListener('click', function() {
            if (toggle_password2.classList.contains("bx-show")) {
                toggle_password2.classList.remove("bx-show");
                toggle_password2.classList.add("bx-hide");
            } else {
                toggle_password2.classList.add("bx-show");
                toggle_password2.classList.remove("bx-hide");
            }
            if (login_password.type === "password") {
                login_password.type = "text";
            } else {
                login_password.type = "password";
            }
            // }
        })
        const register_form = document.getElementById("register_form");

        function validatePassword(password) {
            // regularExpression = /(?=(.*\d){2})(?=(.*[a-z]){2})(?=(.*[A-Z]){2})(?=(.*[!@#$%]){2})/;
            regularExpression = /(?=(.*\d){2})(?=(.*[a-z]){2})(?=(.*[A-Z]){2})/;
            if (password.length < 8 || password.length > 25) {
                return false;
            }
            if (!regularExpression.test(password)) {
                return false;
            }
        }



        function ValidateEmail(email) {
            var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (email.match(validRegex)) {
                return true;
            } else {
                return false;
            }
        }



        register.addEventListener('click', function(e) {



            if (username.value.length == 0 || email.value.length == 0 || password.value.length == 0) {
                e.preventDefault();
                mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">Please provide all information</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;


            } else {
                mess.innerHTML = ``;

                if (username.value.length < 4 || username.value.length > 16) {
                    e.preventDefault();
                    mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">Username must be 4-16 characters</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;

                } else {
                    mess.innerHTML = ``;
                    if (validatePassword(password.value) === false) {
                        e.preventDefault();
                        mess.innerHTML = `
                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">password must be at least 8-25 characters including minimum 2 upper case letters, 2 lower case letters, 2 numbers'</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    } else if (ValidateEmail(email.value) == false) {
                        e.preventDefault();
                        mess.innerHTML = `<div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                            <div class="text-white">Please enter a valid email address</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    } else
                    if (!terms.checked) {
                        e.preventDefault();
                        mess.innerHTML = `<div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                            <div class="text-white">Please accept our terms and conditions</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    } else {
                        register_form.submit();
                    }
                }
            }

        })
    </script>
    <script src="js/app.js"></script>
</body>

</html>