<?php
require("./config/conn.php");
require("./utils/generateMessage.php");
if(isset($_SESSION['varified'])){
if (isset($_POST['reset'])) {
 $password = md5(trim($_POST['password']));   
 if(!empty($password)){
    $updateQuery = "UPDATE users SET password = '$password' WHERE tocken = '{$_SESSION['reset_key']}'";
    $res = mysqli_query($conn,$updateQuery);
    if($res){ 
        unset($_SESSION['varified']);
        $_SESSION['message-success-reset'] = generateMessage("Password Reset Successfully", "success");
        if($_SESSION['message-success-reset']){
            unset($_SESSION['reset_key']);
            header("Location:index.php");
        }
    }else{
        $_SESSION['message'] = generateMessage("ERROR while updating password", "danger");
        header("Location:index.php");
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
                    <h2 class="title">Change Password</h2>
                    <span>
                        <?php if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </span>
                    <span id="mess"></span>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Enter password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" />
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
        const password = document.getElementById('password');
        const cpassword = document.getElementById('cpassword');
        const reset_form = document.getElementById('reset_form');
        const reset = document.getElementById("reset");




        function validatePassword(password) {
            regularExpression = /(?=(.*\d){2})(?=(.*[a-z]){2})(?=(.*[A-Z]){2})(?=(.*[!@#$%]){2})/;
            if (password.length < 8 || password.length > 25) {
                return false;
            }
            if (!regularExpression.test(password)) {
                return false;
            }
        }
        reset.addEventListener('click', function(e) {
            if (password.value.length == 0 || cpassword.value.length == 0) {
                e.preventDefault();
                mess.innerHTML = `
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show"><div class="text-white">Please new password and confirm password</div>
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
                } else if (password.value !== cpassword.value) {
                    e.preventDefault();
                    mess.innerHTML = `
                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">password didn't matching</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                } else {
                    mess.innerHTML = ``;
                    reset_form.submit();
                }
            }
        })
    </script>
</body>

</html>
    <?php  
    } else{
        $_SESSION['message'] = generateMessage("Unauthorized","danger");
        header('Location:index.php');
    }
    ?>