<?php
include('../config/conn.php');
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
include('../utils/generateMessage.php');
$page="dashboard";
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("./inc/header.php") ?>

    <title>Dashboard</title>
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

            <?php
                if (isset($_SESSION['message-updated'])) {

                    echo '<div class="row my-4">
                                <div class="col-12">
                                ' . $_SESSION['message-updated'] . '
                                </div>
                            </div>';
                    unset($_SESSION['message-updated']);
                }  ?>
            <?php
                if (isset($_SESSION['message'])) {

                    echo '<div class="row my-4">
                                <div class="col-12">
                                ' . $_SESSION['message'] . '
                                </div>
                            </div>';
                    unset($_SESSION['message']);
                }  ?>


                <!--end breadcrumb-->
                <h4 class="mb-0 text-uppercase">All Users Accounts</h4>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>#</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>date of registration</th>
                                    <th>last login date</th>
                                    <th>ip of registration</th>
                                    <th>ip of last login</th>
                                    <th>number of vehicles</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $selectUsers = "SELECT * FROM users";
                                    $res = mysqli_query($conn, $selectUsers);
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($user = mysqli_fetch_assoc($res)) {
                                    ?>

                                            <tr>
                                                <td><?php echo $user['id']  ?></td>
                                                <td><a style="color:inherit;text-decoration: none;" href="account_details.php?uId=<?php echo $user['id']  ?>"><?php echo $user['username']  ?></a></td>
                                                <td><?php echo $user['email']  ?></td>
                                                <td><?php echo $user['date_of_reg']  ?></td>
                                                <td><?php echo $user['last_login']  ?></td>
                                                <td><?php echo $user['ip_of_registration']  ?></td>
                                                <td><?php echo $user['ip_last_login']  ?></td>
                                                <td>1</td>

                                            </tr>

                                    <?php }
                                    } else {
                                        echo "<h2>No Data Found</h2>";
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>date of registration</th>
                                    <th>last login date</th>
                                    <th>ip of registration</th>
                                    <th>ip of last login</th>
                                    <th>number of vehicles</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
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

</body>

</html>