<?php
require("../config/conn.php");
if(!isset($_SESSION['admin'])){
    header("Location:logout.php");
}
$page="messages";
?>
<!doctype html>
<html lang="en">

<head>
    <?php include './inc/header.php'  ?>

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










                <!--end breadcrumb-->
                <h4 class="mb-0 text-uppercase">All Users Messages</h4>
                <hr />
                <?php
                if (isset($_SESSION['message'])) {

                    echo '<div class="row my-3">
                                <div class="col-12">
                                ' . $_SESSION['message'] . '
                                </div>
                            </div>';
                    unset($_SESSION['message']);
                }  ?>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>subject</th>
                                    <th>message</th>
                                    <th>action</th>
                                </thead>
                                <tbody>


                                    <?php
                                    $query = "SELECT * FROM contact ORDER BY id DESC";
                                    $res = mysqli_query($conn, $query);
                                    if ($res && mysqli_num_rows($res) > 0) {
                                        while ($message = mysqli_fetch_assoc($res)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $message['id']  ?></td>
                                                <td><?php echo $message['name']  ?></td>
                                                <td><?php echo $message['email']  ?></td>
                                                <td><?php echo $message['subject']  ?></td>
                                                <td><?php echo $message['message']  ?></td>
                                                <td class="text-center"><a href="delete-message.php?message-id=<?php echo $message['id']  ?>" class="btn btn-danger "><i class='bx bxs-trash'></i> Delete</a></td>
                                            </tr>

                                    <?php }
                                    } else echo '<span class="text-primary">No Messages Are available</span>';  ?>


                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>subject</th>
                                    <th>message</th>
                                    <th>action</th>

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