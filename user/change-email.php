<?php
require("../config/conn.php");
include("../utils/generateMessage.php");
include("../utils/recaptcha.php");
if (!isset($_SESSION['logged_in'])) {
    header('Location:../login.php');
}
if (isset($_POST['reset-email'])) {

    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    $new_email = trim($_POST['new-email']);

    if (!empty($email) && !empty($password) && !empty($new_email)) {
        $checkMail = "SELECT * FROM users WHERE email = '$email' AND username='{$_SESSION['logged_in']}' AND password = '$password'";

        $res = mysqli_query($conn, $checkMail) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['email'] =$email;
            $_SESSION['new_email'] =$new_email;
            $reset_key = bin2hex(random_bytes(40));
            $_SESSION['reset_key'] = $reset_key;
            $updateToken = "UPDATE users SET tocken = '$reset_key' AND email = '$email' AND status=0 WHERE email = '$email'";
            $resUpdate = mysqli_query($conn, $updateToken);
            if ($resUpdate) {
                $to = $new_email;
                $from = 'example@gmail.com';
                $fromName = 'Vehicle Stories';
                $subject = "Email Reset";
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
          <a href="http://localhost/Vehicle-Stories/user/process-email-change.php?reset-link=' . $reset_key . '">Varify Now</a>
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
                    $_SESSION['message'] = generateMessage("Reset Email has sent to your new email. Please check your email", "success");
                } else {
                    $_SESSION['message'] = generateMessage("Email sending failed", "warning");
                }
            } else {
                $_SESSION['message'] = generateMessage("Error While UPDATE", "danger");
            }
        } else {
            $_SESSION['message'] = generateMessage("Wrong Credientials", "danger");
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

<?php include("./inc/nav.php")  ?>

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
                                    <label for="inputLastEnterUsername" class="form-label">Enter Your current email</label>
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input type="email" id="email" name="email" class="form-control border-start-0" placeholder="current email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="inputLastEnterUsername" class="form-label">Enter Your current password</label>
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input type="password" name="password" id="password" class="form-control border-start-0" placeholder="current password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="inputLastEnterUsername" class="form-label">Enter Your new email</label>
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input type="email" name="new-email" id="new_email" class="form-control border-start-0" placeholder="new email address">
                                    </div>
                                </div>

                        <div class="col-12 my-3">
                            <div class="d-grid">
                                <button type="submit" id="reset-email" name="reset-email" class="btn btn-dark btn-lg px-5"><i class="bx bxs-lock-open"></i>Change Email</button>
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
            email = document.getElementById('email'),
            password = document.getElementById('password'),
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
            if (new_email.value.length == 0 || email.value.length == 0 || password.value.length == 0) {
                e.preventDefault();
                mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">Please provide all information</div>
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