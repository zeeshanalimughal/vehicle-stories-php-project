<?php
require("./config/conn.php");
include("./utils/generateMessage.php");
include("./utils/recaptcha.php");
if (isset($_POST['sendMessage'])) {
    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if(!$res['success']){
        $_SESSION['message'] = generateMessage("recaptcha failed, Please varify that you are not a Robot", "warning");
    }else{
          $name = mysqli_real_escape_string($conn, $_POST['name']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $subject = mysqli_real_escape_string($conn, $_POST['subject']);
          $message = mysqli_real_escape_string($conn, $_POST['message']);
    
        $query = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $_SESSION['message'] = generateMessage("Message has been sent successfully", "success");
        } else {
            $_SESSION['message'] = generateMessage("Something went wrong", "warning");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php  include('./inc/header.php')  ?>


    <title>Contact Us</title>

    <link rel="stylesheet" href="./css/contact-form.css">
</head>

<body>
<?php include('./inc/nav.php')  ?>


    <div class="container-contact100">
        <div class="wrap-contact100">
            <form id="contact_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="contact100-form validate-form">
                <span class="contact100-form-title">
                    Send Us A Message
                </span>
                <span id="mess">
                    <?php if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    } ?>
                </span>
                <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                    <input class="input100" type="text" id="name" name="name" placeholder="Full Name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Please enter your email: e@a.x">
                    <input class="input100" type="text" id="email" name="email" placeholder="E-mail">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Please entersubject">
                    <input class="input100" type="text" id="subject" name="subject" placeholder="subject">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Please enter your message">
                    <textarea class="input100" id="message" name="message" placeholder="Your Message"></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="g-recaptcha brochure__form__captcha" data-sitekey="SITE_KEY_HERE"></div>
                <div class="container-contact100-form-btn">
                    <button type="submit" id="submit" name="sendMessage" class="contact100-form-btn">
                        <span>
                            <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
                            Send
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <?php include './inc/footer.php' ?>

    <script>
        const name = document.getElementById('name'),
            email = document.getElementById('email'),
            subject = document.getElementById('subject'),
            message = document.getElementById('message'),
            mess = document.getElementById('mess'),
            submit = document.getElementById('submit'),
            contact_form = document.getElementById('contact_form');
        submit.addEventListener('click', function(e) {
            if (name.value == '' || email.value == '' || subject.value == '' || message.value == '') {
                e.preventDefault();
                mess.innerHTML = `<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
									<div class="text-white">Please provide all the details</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>`;
            } else {
                contact_form.submit()
                contact_form.reset()
            }
        })
    </script>

</body>

</html>