<?php
require("./config/conn.php");
require("./utils/generateMessage.php");
if (isset($_POST['reset'])) {

      $email = trim($_POST['email']);
    if (!empty($email)) {
        $checkMail = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $checkMail);
        if (mysqli_num_rows($res) > 0) {
             $reset_key = bin2hex(random_bytes(40));
             $_SESSION['reset_key'] = $reset_key;
            $updateToken = "UPDATE users SET tocken = '$reset_key' WHERE email = '$email'";
            $resUpdate = mysqli_query($conn, $updateToken);
            if ($resUpdate) {
                $to = $email;
                $from = 'example@gmail.com';
                $fromName = 'Vehicle Stories';
                $subject = "Password Reset Email";
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
            <p>Please click on th following button to reset your password</p>
            <a href="http://localhost/Vehicle-Stories/account-reset.php?reset-link='.$reset_key.'">Varify Now</a>
        </div>
    </body>
    </html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= 'From:<'.$email.'>' . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'Cc: example@gmail.com' . "\r\n";
                $headers .= 'Bcc: example@gmail.com' . "\r\n";

                // Send email 
                if(mail($to, $subject, $htmlContent, $headers)){ 
                    $_SESSION['message'] = generateMessage("Email has sent successfully. Please check your email", "success");
                } else {
                    $_SESSION['message'] = generateMessage("Email sending failed", "warning");
                }
            }else{
                $_SESSION['message'] = generateMessage("Error While UPDATE", "danger");

            }
        } else {
            $_SESSION['message'] = generateMessage("Wrong Credientials", "danger");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './inc/header.php' ?>
    <title>Forgot Password</title>
</head>

<body>

    <?php include './inc/nav.php'  ?>
    <div class="container_box">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="reset_form" method="POST" class="sign-in-form" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <h2 class="title">Password Reset</h2>

                    <?php if (isset($_SESSION['message-success'])) {
                        echo '  <span style="padding:10px 5px; text-align: center; background-color: #00C853;color: #fff; font-size:16px;border-radius: 8px; margin: 10px 0;">
                            ' . $_SESSION['message-success'] . '
                            </span>';
                        unset($_SESSION['message-success']);
                    } ?>
                    <span>
                        <?php if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </span>
                    <span id="mess"></span>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" id="email" placeholder="Enter your email address" />
                    </div>
                    <input type="submit" name="reset" id="reset" value="Reset Password" class="btn solid" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Have account ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, ex ratione. Aliquid!
                    </p>
                    <a href="index.php"><button class="btn transparent" id="sign-up-btn">
                            Sign in
                        </button></a>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>

        </div>
    </div>


    <?php include './inc/footer.php'  ?>



    <script>
        const mess = document.getElementById('mess');
        const email = document.getElementById('email');
        const reset_form = document.getElementById('reset_form');
        const reset = document.getElementById("reset");

        reset.addEventListener('click', function(e) {
            if (email.value.length == 0) {
                e.preventDefault();
                mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show"><div class="text-white">Please enter your email address</div>
                        </div>`;
            } else {
                mess.innerHTML = ``;
                reset_form.submit();
            }
        })
    </script>
</body>

</html>